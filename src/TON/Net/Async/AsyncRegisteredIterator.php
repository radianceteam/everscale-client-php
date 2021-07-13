<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\Net\RegisteredIterator;
use TON\TonClientException;
use TON\TonRequest;

class AsyncRegisteredIterator
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncRegisteredIterator constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return RegisteredIterator Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): RegisteredIterator
    {
        return new RegisteredIterator($this->_request->await($timeout));
    }
}
