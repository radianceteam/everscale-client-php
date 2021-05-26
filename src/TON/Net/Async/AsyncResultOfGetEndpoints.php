<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\Net\ResultOfGetEndpoints;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfGetEndpoints
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfGetEndpoints constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfGetEndpoints Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfGetEndpoints
    {
        return new ResultOfGetEndpoints($this->_request->await($timeout));
    }
}
