<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\Net\ResultOfWaitForCollection;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfWaitForCollection
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfWaitForCollection constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfWaitForCollection Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfWaitForCollection
    {
        return new ResultOfWaitForCollection($this->_request->await($timeout));
    }
}
