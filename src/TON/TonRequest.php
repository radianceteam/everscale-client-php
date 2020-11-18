<?php

namespace TON;

use Generator;
use Psr\Log\LoggerInterface;

class TonRequest
{
    /**
     * @var resource TON request resource.
     */
    private $_resource;
    private LoggerInterface $_logger;

    private bool $_finished = false;
    private ?array $_result = null;
    private ?TonClientException $_error = null;
    private array $_events = [];

    const STATUS_OK = 0;
    const STATUS_ERROR = 1;
    const STATUS_CUSTOM = 100;

    /**
     * AsyncResultOfProcessMessage constructor.
     * @param resource $resource Request resource
     * @param LoggerInterface $logger
     */
    public function __construct($resource, LoggerInterface $logger)
    {
        $this->_resource = $resource;
        $this->_logger = $logger;
        $this->_finished = is_ton_request_finished($this->_resource);
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
     * @return ?array Function execution result or null, if execution not started.
     * @throws TonClientException Function execution error.
     * @see {@link getEvents}
     */
    function await(): ?array
    {
        if ($this->_error) {
            throw $this->_error;
        }

        $this->_logger->debug("Awaiting for the result...");

        while ($this->_readNextEvent(true)) {
            // continue...
        }

        return $this->_result;
    }

    /**
     * @return Generator generator of {@link array} - decoded events.
     * @throws TonClientException Function execution error.
     */
    public function getEvents(): Generator
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

        while ($event = $this->_readNextEvent()) {
            yield $event;
        }
    }

    /**
     * Blocks until the next event comes in.
     * When finished, returns immediately.
     * In case of an error returns immediately.
     *
     * @param bool $untilResponse Whether to return false if response is returned, continue to the next event otherwise.
     * @return false|mixed|null false if $untilResponse is set to true and function result is returned, null when finished, and the very next processing event otherwise.
     */
    private function _readNextEvent(bool $untilResponse = false)
    {
        // here, the client extension will block until the very next event is fired
        // which can be either status(=OK|ERROR) or event(>=CUSTOM).
        while (!$this->_finished && ([$json, $status, $finished] = ton_request_next($this->_resource))) {
            if ($finished) {
                $this->_logger->debug("Finished");
                $this->_finished = true;
            }
            if ($status === self::STATUS_OK) {
                $this->_logger->debug("Function result read: ${json}");
                if ($json) {
                    // void functions don't return anything
                    $this->_result = json_decode($json, true);
                    if (!$this->_result) {
                        $this->_error = new TonClientException("The returned JSON is invalid: ${json}");
                        throw $this->_error;
                    }
                }
                if ($untilResponse) {
                    return false;
                }
            }
            if ($status === self::STATUS_ERROR) {
                $this->_logger->debug("Function error read: ${json}");
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

        return null;
    }
}