<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\Client\ClientConfig;
use TON\TonClientException;
use TON\TonRequest;

class AsyncClientConfig
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncClientConfig constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ClientConfig Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ClientConfig
    {
        return new ClientConfig($this->_request->await($timeout));
    }
}
