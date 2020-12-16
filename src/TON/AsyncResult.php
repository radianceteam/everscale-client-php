<?php

namespace TON;

class AsyncResult implements AsyncInterface
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncDecodedMessageBody constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Timeout in millis. -1 means no timeout.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): void
    {
        $this->_request->await($timeout);
    }

    function join(JoinableInterface $joinable, int $disconnect = JoinableInterface::DISCONNECT_AFTER_AWAIT): self
    {
        $this->_request->join($joinable->getRequest(), $disconnect);
        return $this;
    }

    public function disconnect(JoinableInterface $joinable): self
    {
        $this->_request->disconnect($joinable->getRequest());
        return $this;
    }
}