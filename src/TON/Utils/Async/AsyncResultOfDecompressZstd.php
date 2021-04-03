<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils\Async;

use TON\TonClientException;
use TON\TonRequest;
use TON\Utils\ResultOfDecompressZstd;

class AsyncResultOfDecompressZstd
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfDecompressZstd constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfDecompressZstd Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfDecompressZstd
    {
        return new ResultOfDecompressZstd($this->_request->await($timeout));
    }
}
