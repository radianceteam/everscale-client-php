<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\Net\ResultOfBatchQuery;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfBatchQuery
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfBatchQuery constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfBatchQuery Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfBatchQuery
    {
        return new ResultOfBatchQuery($this->_request->await($timeout));
    }
}
