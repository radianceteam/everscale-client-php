<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

use TON\Abi\ResultOfEncodeAccount;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfEncodeAccount
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfEncodeAccount constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfEncodeAccount Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfEncodeAccount
    {
        return new ResultOfEncodeAccount($this->_request->await());
    }
}
