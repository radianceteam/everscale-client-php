<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfFactorize;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfFactorize
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfFactorize constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfFactorize Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfFactorize
    {
        return new ResultOfFactorize($this->_request->await($timeout));
    }
}
