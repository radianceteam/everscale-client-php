<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfGenerateRandomBytes;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfGenerateRandomBytes
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfGenerateRandomBytes constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfGenerateRandomBytes Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfGenerateRandomBytes
    {
        return new ResultOfGenerateRandomBytes($this->_request->await());
    }
}
