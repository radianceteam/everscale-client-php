<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfChaCha20;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfChaCha20
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfChaCha20 constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfChaCha20 Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfChaCha20
    {
        return new ResultOfChaCha20($this->_request->await());
    }
}
