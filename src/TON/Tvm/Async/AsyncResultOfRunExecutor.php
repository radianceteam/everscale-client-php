<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm\Async;

use TON\TonClientException;
use TON\TonRequest;
use TON\Tvm\ResultOfRunExecutor;

class AsyncResultOfRunExecutor
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfRunExecutor constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfRunExecutor Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfRunExecutor
    {
        return new ResultOfRunExecutor($this->_request->await());
    }
}
