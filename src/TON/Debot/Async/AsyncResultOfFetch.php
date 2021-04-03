<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot\Async;

use TON\Debot\ResultOfFetch;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfFetch
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfFetch constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfFetch Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfFetch
    {
        return new ResultOfFetch($this->_request->await($timeout));
    }
}
