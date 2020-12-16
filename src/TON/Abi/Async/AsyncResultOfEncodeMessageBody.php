<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

use TON\Abi\ResultOfEncodeMessageBody;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfEncodeMessageBody
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfEncodeMessageBody constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfEncodeMessageBody Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfEncodeMessageBody
    {
        return new ResultOfEncodeMessageBody($this->_request->await($timeout));
    }
}
