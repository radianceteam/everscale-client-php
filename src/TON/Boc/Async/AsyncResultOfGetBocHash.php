<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc\Async;

use TON\Boc\ResultOfGetBocHash;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfGetBocHash
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfGetBocHash constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfGetBocHash Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfGetBocHash
    {
        return new ResultOfGetBocHash($this->_request->await());
    }
}
