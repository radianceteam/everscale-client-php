<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfMnemonicFromRandom;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfMnemonicFromRandom
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfMnemonicFromRandom constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfMnemonicFromRandom Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfMnemonicFromRandom
    {
        return new ResultOfMnemonicFromRandom($this->_request->await());
    }
}
