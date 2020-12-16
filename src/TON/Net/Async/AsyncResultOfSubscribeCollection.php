<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use Generator;
use TON\EventsInterface;
use TON\Net\ResultOfSubscribeCollection;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfSubscribeCollection implements EventsInterface
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfSubscribeCollection constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfSubscribeCollection Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfSubscribeCollection
    {
        return new ResultOfSubscribeCollection($this->_request->await($timeout));
    }

    /**
     * @param int $timeout Timeout in millis. -1 means no timeout.
     * @return Generator generator of {@link array}
     */
    public function getEvents(int $timeout = -1): Generator
    {
        foreach ($this->_request->getEvents($timeout) as $event) yield $event;
    }
}
