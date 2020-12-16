<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\Client\ResultOfGetApiReference;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfGetApiReference
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfGetApiReference constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfGetApiReference Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfGetApiReference
    {
        return new ResultOfGetApiReference($this->_request->await($timeout));
    }
}
