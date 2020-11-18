<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfHDKeySecretFromXPrv;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfHDKeySecretFromXPrv
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfHDKeySecretFromXPrv constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfHDKeySecretFromXPrv Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfHDKeySecretFromXPrv
    {
        return new ResultOfHDKeySecretFromXPrv($this->_request->await());
    }
}
