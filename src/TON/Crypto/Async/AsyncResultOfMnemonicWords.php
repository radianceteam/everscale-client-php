<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfMnemonicWords;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfMnemonicWords
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfMnemonicWords constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfMnemonicWords Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfMnemonicWords
    {
        return new ResultOfMnemonicWords($this->_request->await());
    }
}
