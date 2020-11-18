<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc\Async;

use TON\Boc\ResultOfGetBlockchainConfig;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfGetBlockchainConfig
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfGetBlockchainConfig constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfGetBlockchainConfig Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfGetBlockchainConfig
    {
        return new ResultOfGetBlockchainConfig($this->_request->await());
    }
}
