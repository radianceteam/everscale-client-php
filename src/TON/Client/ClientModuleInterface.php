<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use TON\Client\Async\ClientModuleAsyncInterface;

/**
 * Provides information about library.
 */
interface ClientModuleInterface
{
    /**
     * @return ClientModuleAsyncInterface Async version of client module interface.
     */
    function async(): ClientModuleAsyncInterface;

    /**
     * Returns Core Library API reference
     * @return ResultOfGetApiReference
     */
    function getApiReference(): ResultOfGetApiReference;

    /**
     * Returns Core Library version
     * @return ResultOfVersion
     */
    function version(): ResultOfVersion;

    /**
     * Returns detailed information about this build.
     * @return ResultOfBuildInfo
     */
    function buildInfo(): ResultOfBuildInfo;

    /**
     * @param ParamsOfResolveAppRequest $params
     */
    function resolveAppRequest(ParamsOfResolveAppRequest $params);
}
