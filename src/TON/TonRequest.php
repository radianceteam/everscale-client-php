<?php

namespace TON;

use Exception;
use Generator;
use Psr\Log\LoggerInterface;
use TON\Client\AppRequestResult_Error;
use TON\Client\AppRequestResult_Ok;
use TON\Client\ClientModule;
use TON\Client\ParamsOfAppRequest;
use TON\Client\ParamsOfResolveAppRequest;

class TonRequest
{
    private TonContext $_context;

    /**
     * @var TonRequest[]
     */
    private static array $_pendingRequests = [];

    /**
     * @var resource TON request resource.
     */
    private $_resource;
    private int $_id;
    private LoggerInterface $_logger;

    private bool $_finished;
    private ?array $_result = null;
    private ?TonClientException $_error = null;
    private array $_events = [];

    /**
     * @var JoinedRequest[] $_joined
     */
    private array $_joined = [];

    /**
     * @var callable|null Function that transforms app request into app response.
     */
    private $_callback;

    const STATUS_OK = 0;
    const STATUS_ERROR = 1;
    const STATUS_APP_REQUEST = 3;
    const STATUS_APP_NOTIFICATION = 4;
    const STATUS_CUSTOM = 100;

    /**
     * AsyncResultOfProcessMessage constructor.
     * @param TonContext $context
     * @param resource $resource Request resource
     * @param LoggerInterface $logger
     * @param callable|null $callback
     */
    public function __construct(TonContext $context, $resource, LoggerInterface $logger, ?callable $callback = null)
    {
        $this->_id = ton_request_id($resource);
        $this->_context = $context;
        $this->_resource = $resource;
        $this->_logger = $logger;
        $this->_callback = $callback;
        $this->_finished = is_ton_request_finished($this->_resource);
        $logger->debug("Request id {$this->_id}");
        foreach (self::$_pendingRequests as $request) {
            $this->join($request);
        }
    }

    /**
     * Registers this request as globally-listened.
     * Means every new request will first process events
     * from this request and then continue with own events.
     * Finished requests will be unregistered automatically.
     */
    public function listen(): void
    {
        self::$_pendingRequests[] = $this;
    }

    /**
     * @return bool Whether the function execution is finished.
     */
    public function isFinished(): bool
    {
        return $this->_finished;
    }

    /**
     * Blocks until function execution is finished and returns function result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ?array Function execution result or null, if execution not started.
     * @throws TonClientException Function execution error.
     * @see {@link getEvents}
     */
    function await(int $timeout = -1): ?array
    {
        if ($this->_error) {
            throw $this->_error;
        }

        $this->_logger->debug("Awaiting for the result...");

        // read all explicitly registered requests
        foreach ($this->_joined as $joined) {
            while ($joined->getRequest()->_readNextEvent(false, 0)) {
                // continue...
            }
        }

        // and then read own request's events
        while ($this->_readNextEvent(true, $timeout)) {
            // continue...
        }

        // disconnect explicitly joined requests if marked as DISCONNECT_AFTER_AWAIT
        foreach ($this->_joined as $joined) {
            if ($joined->getRequest()->_finished ||
                $joined->getDisconnect() === JoinableInterface::DISCONNECT_AFTER_AWAIT) {
                $this->_logger->debug("Request {$this} disconnecting from {$joined->getRequest()} after await");
                $this->disconnect($joined->getRequest());
            }
        }

        return $this->_result;
    }

    /**
     * @param int $timeout Timeout in millis. -1 means no timeout.
     * @return Generator generator of {@link array} - decoded events.
     * @throws TonClientException Function execution error.
     */
    public function getEvents(int $timeout = -1): Generator
    {
        $this->_logger->debug("Getting events...");

        if ($this->_error) {
            throw $this->_error;
        }

        if ($this->_finished) {
            $this->_logger->debug("Re-reading saved events");
            foreach ($this->_events as $event) {
                yield $event;
            }
            return;
        }

        while ($event = $this->_readNextEvent(false, $timeout)) {
            yield $event;
        }
    }

    /**
     * @param TonRequest $request Disconnect option.
     * @param int $disconnect
     * @return bool Whether join was successful.
     */
    public function join(TonRequest $request, int $disconnect = JoinableInterface::DISCONNECT_AFTER_AWAIT): bool
    {
        foreach ($this->_joined as $joined) {
            if ($joined->getRequest()->_id === $request->_id) {
                $this->_logger->warning("{$this} already joined to {$request}");
                return true;
            }
        }
        if (!ton_request_join($this->_resource, $request->_resource)) {
            $this->_logger->warning("Failed to join {$this} to {$request}");
            return false;
        }
        $this->_joined[] = new JoinedRequest($request, $disconnect);
        $this->_logger->debug("{$this} joined to {$request} (${disconnect}))");
        return true;
    }

    /**
     * @param TonRequest $request
     * @return bool Whether disconnect was successful.
     */
    public function disconnect(TonRequest $request): bool
    {
        $disconnected = false;
        foreach ($this->_joined as $i => $joined) {
            if ($joined->getRequest() === $request) {
                if (ton_request_disconnect($this->_resource, $request->_resource)) {
                    $this->_logger->debug("{$this} disconnected from {$request}");
                    $disconnected = true;
                } else {
                    $this->_logger->debug("Failed to disconnect request {$this} from {$request}");
                }
                array_splice($this->_joined, $i, 1);
                return $disconnected;
            }
        }
        $this->_logger->warning("Request {$this} was NOT joined to {$request}. Ignoring disconnect.");
        return $disconnected;
    }

    /**
     * Blocks until the next event comes in.
     * When finished, returns immediately.
     * In case of an error returns immediately.
     *
     * @param bool $untilResponse Whether to return false if response is returned, continue to the next event otherwise.
     * @param int $timeout Request timeout in millis. -1 means no timeout.
     * @return false|mixed|null false if $untilResponse is set to true and function result is returned, null when finished, and the very next processing event otherwise.
     */
    private function _readNextEvent(bool $untilResponse = false, int $timeout = -1)
    {
        // here, the client extension will block until the very next event is fired
        // which can be either status(=OK|ERROR) or event(>=CUSTOM).
        while (!$this->_finished && ([$json, $status, $finished, $id] = ton_request_next($this->_resource, $timeout))) {
            $request = $this->_findProcessingRequest($id);
            if (!$request) {
                $this->_logger->warning("Can't find request ${id}");
                continue;
            }
            $event = $request->_processEvent($json, $status, $finished);
            if ($this->_result && $untilResponse) {
                return false;
            }
            if ($event) {
                return $event;
            }
        }
        return null;
    }

    private function _findProcessingRequest(int $id): ?TonRequest
    {
        if ($id === $this->_id) {
            return $this;
        }
        foreach ($this->_joined as $joined) {
            if ($joined->getRequest()->_id === $id) {
                return $joined->getRequest();
            }
        }
        return null;
    }

    private function _processEvent(string $json, int $status, bool $finished)
    {
        if ($finished) {
            $this->_logger->debug("Finished");
            $this->_finished = true;
            foreach (self::$_pendingRequests as $i => $request) {
                if ($request === $this) {
                    array_splice(self::$_pendingRequests, $i, 1);
                }
            }
        }
        if ($status === self::STATUS_OK) {
            $this->_logger->debug("Function result read: ${json}");
            if ($json && $json !== 'null') { // FIXME: sometimes client returns 'null'?;
                // void functions don't return anything
                $this->_result = json_decode($json, true);
                if (!$this->_result) {
                    $this->_error = new TonClientException("The returned JSON is invalid: ${json}");
                    throw $this->_error;
                }
            }
        }
        if ($status === self::STATUS_APP_REQUEST) {
            $this->_logger->debug("App request: ${status} (${json})");
            $params = new ParamsOfAppRequest(json_decode($json, true));
            if (!$this->_callback) {
                $this->_logger->warning("No callback provided; skipping app request {$params->getAppRequestId()}");
                return null;
            }
            try {
                $result = ($this->_callback)($params->getRequestData());
                (new ClientModule($this->_context))->resolveAppRequest((new ParamsOfResolveAppRequest())
                    ->setAppRequestId($params->getAppRequestId())
                    ->setResult((new AppRequestResult_Ok())
                        ->setResult($result)));
            } catch (Exception $e) {
                $requestData = json_encode($params->getRequestData());
                $this->_logger->error("Failed to process request {$params->getAppRequestId()} callback ({$requestData})", [
                    'exception' => $e
                ]);
                try {
                    (new ClientModule($this->_context))->resolveAppRequest((new ParamsOfResolveAppRequest())
                        ->setAppRequestId($params->getAppRequestId())
                        ->setResult((new AppRequestResult_Error())
                            ->setText($e->getMessage())));
                } catch (Exception $e2) {
                    $this->_logger->error("Failed to send error result for app request {$params->getAppRequestId()}", [
                        'exception' => $e2
                    ]);
                }
            }
        }
        if ($status === self::STATUS_APP_NOTIFICATION) {
            $this->_logger->debug("App notification: ${status} (${json})");
            if (!$this->_callback) {
                $this->_logger->warning("No callback provided; skipping app notification ${json}");
                return null;
            } else {
                try {
                    ($this->_callback)(json_decode($json, true));
                } catch (Exception $e) {
                    $this->_logger->error("Failed to process app notification ${json}", [
                        'exception' => $e
                    ]);
                }
            }
        }
        if ($status === self::STATUS_ERROR) {
            $this->_logger->debug("Error: ${json}");
            $this->_error = TonClientException::fromJson($json);
            throw $this->_error;
        }
        if ($status >= self::STATUS_CUSTOM) {
            $this->_logger->debug("Function custom event read: ${status} (${json})");
            $event = json_decode($json, true);
            array_push($this->_events, $event);
            return $event;
        }
    }

    public function __toString(): string
    {
        return "Request {$this->_id}";
    }
}
