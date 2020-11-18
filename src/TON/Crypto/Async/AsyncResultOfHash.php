<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfHash;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfHash
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfHash constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfHash Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfHash
    {
        return new ResultOfHash($this->_request->await());
    }
}
