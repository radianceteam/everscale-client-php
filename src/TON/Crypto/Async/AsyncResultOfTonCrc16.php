<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfTonCrc16;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfTonCrc16
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfTonCrc16 constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfTonCrc16 Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfTonCrc16
    {
        return new ResultOfTonCrc16($this->_request->await($timeout));
    }
}
