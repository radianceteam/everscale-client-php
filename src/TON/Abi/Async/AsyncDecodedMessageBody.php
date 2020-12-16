<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

use TON\Abi\DecodedMessageBody;
use TON\TonClientException;
use TON\TonRequest;

class AsyncDecodedMessageBody
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
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return DecodedMessageBody Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): DecodedMessageBody
    {
        return new DecodedMessageBody($this->_request->await($timeout));
    }
}
