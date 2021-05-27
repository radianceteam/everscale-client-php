<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\Net\ResultOfQueryTransactionTree;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfQueryTransactionTree
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfQueryTransactionTree constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfQueryTransactionTree Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfQueryTransactionTree
    {
        return new ResultOfQueryTransactionTree($this->_request->await($timeout));
    }
}
