<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use TON\Client\Async\ClientModuleAsyncInterface;

interface ClientModuleInterface
{
    /**
     * @return ClientModuleAsyncInterface Async version of client module interface.
     */
    function async(): ClientModuleAsyncInterface;

    /**
     * @return ResultOfGetApiReference
     */
    function getApiReference(): ResultOfGetApiReference;

    /**
     * @return ResultOfVersion
     */
    function version(): ResultOfVersion;

    /**
     * @return ResultOfBuildInfo
     */
    function buildInfo(): ResultOfBuildInfo;

    /**
     * @param ParamsOfResolveAppRequest $params
     */
    function resolveAppRequest(ParamsOfResolveAppRequest $params);
}
