<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\AsyncResult;
use TON\Client\ParamsOfResolveAppRequest;
use TON\TonContext;

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
     * @return AsyncResultOfGetApiReference
     */
    public function getApiReferenceAsync(): AsyncResultOfGetApiReference
    {
        return new AsyncResultOfGetApiReference($this->_context->callFunctionAsync('client.get_api_reference'));
    }

    /**
     * @return AsyncResultOfVersion
     */
    public function versionAsync(): AsyncResultOfVersion
    {
        return new AsyncResultOfVersion($this->_context->callFunctionAsync('client.version'));
    }

    /**
     * @return AsyncClientConfig
     */
    public function configAsync(): AsyncClientConfig
    {
        return new AsyncClientConfig($this->_context->callFunctionAsync('client.config'));
    }

    /**
     * @return AsyncResultOfBuildInfo
     */
    public function buildInfoAsync(): AsyncResultOfBuildInfo
    {
        return new AsyncResultOfBuildInfo($this->_context->callFunctionAsync('client.build_info'));
    }

    /**
     * @param ParamsOfResolveAppRequest $params
     * @return AsyncResult
     */
    public function resolveAppRequestAsync(ParamsOfResolveAppRequest $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('client.resolve_app_request', $params));
    }
}
