<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\Crypto\KeyPair;
use TON\TonClientException;
use TON\TonRequest;

class AsyncKeyPair
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncKeyPair constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return KeyPair Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): KeyPair
    {
        return new KeyPair($this->_request->await());
    }
}
