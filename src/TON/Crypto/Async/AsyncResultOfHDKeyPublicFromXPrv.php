<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfHDKeyPublicFromXPrv;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfHDKeyPublicFromXPrv
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfHDKeyPublicFromXPrv constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfHDKeyPublicFromXPrv Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfHDKeyPublicFromXPrv
    {
        return new ResultOfHDKeyPublicFromXPrv($this->_request->await());
    }
}
