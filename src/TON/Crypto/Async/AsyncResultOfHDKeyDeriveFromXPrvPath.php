<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfHDKeyDeriveFromXPrvPath;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfHDKeyDeriveFromXPrvPath
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfHDKeyDeriveFromXPrvPath constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfHDKeyDeriveFromXPrvPath Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfHDKeyDeriveFromXPrvPath
    {
        return new ResultOfHDKeyDeriveFromXPrvPath($this->_request->await());
    }
}
