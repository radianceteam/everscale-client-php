<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\ResultOfModularPower;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfModularPower
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfModularPower constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfModularPower Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfModularPower
    {
        return new ResultOfModularPower($this->_request->await($timeout));
    }
}
