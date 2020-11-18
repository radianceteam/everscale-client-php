<?php

namespace TON;

use InvalidArgumentException;
use JsonSerializable;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class TonContext
{
    private int $_id;

    private LoggerInterface $_logger;

    /**
     * TonContext constructor.
     * @param JsonSerializable|null $config Optional TON client configuration.
     * @param LoggerInterface|null $logger Optional logger.
     * @throws TonClientException Failed to create TON client context.
     */
    public function __construct(
        ?JsonSerializable $config = null,
        ?LoggerInterface $logger = null)
    {
        $this->_logger = $logger ?? new NullLogger();
        $encoded = $config ? json_encode($config) : "";
        $this->_logger->debug("Calling ton_create_context with parameters ${encoded}");
        $json = ton_create_context($encoded);
        $this->_logger->debug("ton_create_context returned ${json}");
        $this->_id = self::handleResponseJson($json);
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): self
    {
        if ($logger == null) {
            throw new InvalidArgumentException("logger cannot be null");
        }
        $this->_logger = $logger;
        return $this;
    }

    /**
     * @param string $function_name Function name.
     * @param object|null $args Optional function args.
     * @return mixed Function execution result.
     * @throws TonClientException Failed to call function or context is destroyed.
     */
    public function callFunction(string $function_name, object $args = null)
    {
        if (empty($function_name)) {
            throw new InvalidArgumentException("Function name must not be empty");
        }
        if ($this->_id === -1) {
            throw new TonClientException("TON context is destroyed.");
        }
        $params_json = json_encode($args);
        $this->_logger->debug("Calling function ${function_name} with parameters ${params_json}");
        $response_json = ton_request_sync($this->_id, $function_name, $params_json);
        $this->_logger->debug("Response JSON: ${response_json}");
        return self::handleResponseJson($response_json);
    }

    /**
     * Starts function call and returns resource associated with it so it can be awaited later.
     * @param string $function_name Function name.
     * @param object|null $args Optional function args.
     * @return TonRequest The returned request handle.
     * @throws TonClientException Failed to call function or context is destroyed.
     */
    public function callFunctionAsync(string $function_name, object $args = null)
    {
        if (empty($function_name)) {
            throw new InvalidArgumentException("Function name must not be empty");
        }
        if ($this->_id === -1) {
            throw new TonClientException("TON context is destroyed.");
        }
        $params_json = json_encode($args);
        $this->_logger->debug("Calling async function ${function_name} with parameters ${params_json}");
        $resource = ton_request_start($this->_id, $function_name, $params_json);
        $this->_logger->debug("function ${function_name} started: ${resource}");
        return new TonRequest($resource, new TonRequestLogger($function_name, $resource, $this->_logger));
    }

    public function destroy()
    {
        if ($this->_id != -1) {
            $this->_logger->debug("Calling ton_destroy_context with context id {$this->_id}");
            ton_destroy_context($this->_id);
            $this->_id = -1;
        }
    }

    public function __destruct()
    {
        $this->destroy();
    }

    /**
     * @param string $json JSON returned by the ton client extension function.
     * @return mixed Decoded result.
     * @throws TonClientException In case of error returned.
     */
    public static function handleResponseJson(string $json)
    {
        $response = json_decode($json, true);
        if (!$response) {
            throw new TonClientException("The returned JSON is invalid: ${json}");
        }
        if (isset($response['error'])) {
            throw TonClientException::fromErrorDto($response['error']);
        }
        if (!isset($response['result'])) {
            throw new TonClientException("Unsupported JSON returned: ${json}");
        }
        return $response['result'];
    }
}
