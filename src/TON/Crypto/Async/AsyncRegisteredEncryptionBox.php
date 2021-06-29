<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use Generator;
use TON\Crypto\RegisteredEncryptionBox;
use TON\EventsInterface;
use TON\JoinableInterface;
use TON\TonClientException;
use TON\TonRequest;

class AsyncRegisteredEncryptionBox implements EventsInterface, JoinableInterface
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncRegisteredEncryptionBox constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
        $this->_request->listen();
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return RegisteredEncryptionBox Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): RegisteredEncryptionBox
    {
        return new RegisteredEncryptionBox($this->_request->await($timeout));
    }

    /**
     * @param int $timeout Timeout in millis. -1 means no timeout.
     * @return Generator generator of {@link array}
     */
    public function getEvents(int $timeout = -1): Generator
    {
        foreach ($this->_request->getEvents($timeout) as $event) yield $event;
    }

    /**
     * @return TonRequest
     */
    public function getRequest(): TonRequest
    {
        return $this->_request;
    }
}
