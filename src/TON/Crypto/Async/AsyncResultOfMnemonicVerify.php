<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfMnemonicVerify;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfMnemonicVerify
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfMnemonicVerify constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfMnemonicVerify Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfMnemonicVerify
    {
        return new ResultOfMnemonicVerify($this->_request->await());
    }
}
