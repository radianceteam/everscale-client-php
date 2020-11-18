<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

use TON\Abi\ResultOfAttachSignature;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfAttachSignature
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfAttachSignature constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfAttachSignature Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfAttachSignature
    {
        return new ResultOfAttachSignature($this->_request->await());
    }
}
