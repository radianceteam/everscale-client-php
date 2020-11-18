<?php

namespace TON;

class AsyncResult
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
     * @throws TonClientException Function execution error.
     */
    public function await(): void
    {
        $this->_request->await();
    }
}