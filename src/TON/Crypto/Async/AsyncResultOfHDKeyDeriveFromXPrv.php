<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfHDKeyDeriveFromXPrv;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfHDKeyDeriveFromXPrv
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfHDKeyDeriveFromXPrv constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfHDKeyDeriveFromXPrv Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfHDKeyDeriveFromXPrv
    {
        return new ResultOfHDKeyDeriveFromXPrv($this->_request->await());
    }
}
