<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\Client\ResultOfVersion;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfVersion
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfVersion constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfVersion Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfVersion
    {
        return new ResultOfVersion($this->_request->await($timeout));
    }
}
