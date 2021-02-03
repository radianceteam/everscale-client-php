<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\Net\ResultOfAggregateCollection;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfAggregateCollection
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfAggregateCollection constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfAggregateCollection Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfAggregateCollection
    {
        return new ResultOfAggregateCollection($this->_request->await($timeout));
    }
}
