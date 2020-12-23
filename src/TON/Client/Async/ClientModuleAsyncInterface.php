<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\AsyncResult;
use TON\Client\ParamsOfResolveAppRequest;

interface ClientModuleAsyncInterface
{
    /**
     * @return AsyncResultOfGetApiReference
     */
    function getApiReferenceAsync(): AsyncResultOfGetApiReference;

    /**
     * @return AsyncResultOfVersion
     */
    function versionAsync(): AsyncResultOfVersion;

    /**
     * @return AsyncResultOfBuildInfo
     */
    function buildInfoAsync(): AsyncResultOfBuildInfo;

    /**
     * @param ParamsOfResolveAppRequest $params
     * @return AsyncResult
     */
    function resolveAppRequestAsync(ParamsOfResolveAppRequest $params): AsyncResult;
}
