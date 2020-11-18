<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\Client\ResultOfBuildInfo;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfBuildInfo
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfBuildInfo constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfBuildInfo Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfBuildInfo
    {
        return new ResultOfBuildInfo($this->_request->await());
    }
}
