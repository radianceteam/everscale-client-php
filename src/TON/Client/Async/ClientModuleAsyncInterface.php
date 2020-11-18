<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client\Async;

/**
 * Provides information about library.
 */
interface ClientModuleAsyncInterface
{
    /**
     * Returns Core Library API reference
     */
    function getApiReferenceAsync(): AsyncResultOfGetApiReference;

    /**
     * Returns Core Library version
     */
    function versionAsync(): AsyncResultOfVersion;

    /**
     * Returns detailed information about this build.
     */
    function buildInfoAsync(): AsyncResultOfBuildInfo;
}
