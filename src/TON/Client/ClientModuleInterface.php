<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

/**
 * Provides information about library.
 */
interface ClientModuleInterface
{
    /**
     * Returns Core Library API reference
     */
    function getApiReference(): ResultOfGetApiReference;

    /**
     * Returns Core Library version
     */
    function version(): ResultOfVersion;

    /**
     * Returns detailed information about this build.
     */
    function buildInfo(): ResultOfBuildInfo;
}
