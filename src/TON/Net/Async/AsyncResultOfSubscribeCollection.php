<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use Generator;
use TON\Net\ResultOfSubscribeCollection;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfSubscribeCollection
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
     * @return ResultOfSubscribeCollection Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfSubscribeCollection
    {
        return new ResultOfSubscribeCollection($this->_request->await());
    }

    /**
     * @return Generator generator of {@link array}
     */
    public function getEvents(): Generator
    {
        foreach ($this->_request->getEvents() as $event) yield $event;
    }
}
