<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\TonContext;

/**
 * Provides information about library.
 */
class AsyncClientModule implements ClientModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncClientModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Returns Core Library API reference
     */
    public function getApiReferenceAsync(): AsyncResultOfGetApiReference
    {
        return new AsyncResultOfGetApiReference($this->_context->callFunctionAsync('client.get_api_reference'));
    }

    /**
     * Returns Core Library version
     */
    public function versionAsync(): AsyncResultOfVersion
    {
        return new AsyncResultOfVersion($this->_context->callFunctionAsync('client.version'));
    }

    /**
     * Returns detailed information about this build.
     */
    public function buildInfoAsync(): AsyncResultOfBuildInfo
    {
        return new AsyncResultOfBuildInfo($this->_context->callFunctionAsync('client.build_info'));
    }
}
