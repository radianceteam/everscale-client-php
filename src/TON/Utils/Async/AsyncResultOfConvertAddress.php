<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils\Async;

use TON\TonClientException;
use TON\TonRequest;
use TON\Utils\ResultOfConvertAddress;

class AsyncResultOfConvertAddress
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfConvertAddress constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @return ResultOfConvertAddress Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(): ResultOfConvertAddress
    {
        return new ResultOfConvertAddress($this->_request->await());
    }
}
