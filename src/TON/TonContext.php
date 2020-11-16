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
     * @throws TonClientException Failed to create TON client context.
     */
    public function __construct(JsonSerializable $config = null)
    {
        $json = ton_create_context($config ? json_encode($config) : "");
        $this->_id = $this->_handleResponseJson($json);
        $this->_logger = new NullLogger();
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
        $response_json = ton_request($this->_id, $function_name, $params_json);
        $this->_logger->debug("Response JSON: ${response_json}");
        return $this->_handleResponseJson($response_json);
    }

    public function destroy()
    {
        if ($this->_id) {
            ton_destroy_context($this->_id);
            $this->_id = -1;
        }
    }

    public function __destruct()
    {
        $this->destroy();
    }

    private function _handleResponseJson(string $json)
    {
        $response = json_decode($json, true);
        if (!$response) {
            throw new TonClientException("The returned JSON is invalid: ${json}");
        }
        if (isset($response['error'])) {
            if (!isset($response['error']['message'])) {
                throw new TonClientException("Error JSON returned: ${json}");
            }
            throw new TonClientException($response['error']['message'], $response['error']['code'] ?? 0);
        }
        if (!isset($response['result'])) {
            throw new TonClientException("Unsupported JSON returned: ${json}");
        }
        return $response['result'];
    }
}
