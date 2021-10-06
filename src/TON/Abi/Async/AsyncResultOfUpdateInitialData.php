<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

use TON\Abi\ResultOfUpdateInitialData;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfUpdateInitialData
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfUpdateInitialData constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfUpdateInitialData Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfUpdateInitialData
    {
        return new ResultOfUpdateInitialData($this->_request->await($timeout));
    }
}
