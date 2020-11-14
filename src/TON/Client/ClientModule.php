<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use TON\TonContext;

/**
 * Provides information about library.
 */
class ClientModule implements ClientModuleInterface
{
    private TonContext $_context;

    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Returns Core Library API reference
     */
    public function getApiReference(): ResultOfGetApiReference
    {
        return new ResultOfGetApiReference($this->_context->callFunction('client.get_api_reference'));
    }

    /**
     * Returns Core Library version
     */
    public function version(): ResultOfVersion
    {
        return new ResultOfVersion($this->_context->callFunction('client.version'));
    }

    /**
     * Returns detailed information about this build.
     */
    public function buildInfo(): ResultOfBuildInfo
    {
        return new ResultOfBuildInfo($this->_context->callFunction('client.build_info'));
    }
}
