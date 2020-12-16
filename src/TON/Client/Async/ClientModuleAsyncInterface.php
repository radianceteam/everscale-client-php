<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

use TON\AsyncResult;
use TON\Client\ParamsOfResolveAppRequest;

/**
 * Provides information about library.
 */
interface ClientModuleAsyncInterface
{
    /**
     * Returns Core Library API reference
     * @return AsyncResultOfGetApiReference
     */
    function getApiReferenceAsync(): AsyncResultOfGetApiReference;

    /**
     * Returns Core Library version
     * @return AsyncResultOfVersion
     */
    function versionAsync(): AsyncResultOfVersion;

    /**
     * Returns detailed information about this build.
     * @return AsyncResultOfBuildInfo
     */
    function buildInfoAsync(): AsyncResultOfBuildInfo;

    /**
     * @param ParamsOfResolveAppRequest $params
     * @return AsyncResult
     */
    function resolveAppRequestAsync(ParamsOfResolveAppRequest $params): AsyncResult;
}
