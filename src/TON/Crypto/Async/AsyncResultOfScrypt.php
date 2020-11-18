<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfScrypt;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfScrypt
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfScrypt constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfScrypt Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfScrypt
    {
        return new ResultOfScrypt($this->_request->await());
    }
}
