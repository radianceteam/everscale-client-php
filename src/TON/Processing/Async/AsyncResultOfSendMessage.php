<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing\Async;

use Generator;
use TON\Processing\ProcessingEvent;
use TON\Processing\ResultOfSendMessage;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfSendMessage
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfSendMessage constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfSendMessage Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfSendMessage
    {
        return new ResultOfSendMessage($this->_request->await());
    }

    /**
     * @return Generator generator of {@link ProcessingEvent}
     */
    public function getEvents(): Generator
    {
        foreach ($this->_request->getEvents() as $event)
            yield ProcessingEvent::create($event);
    }
}
