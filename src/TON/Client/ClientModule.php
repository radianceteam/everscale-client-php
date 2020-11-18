<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use TON\Client\Async\AsyncClientModule;
use TON\Client\Async\ClientModuleAsyncInterface;
use TON\TonContext;

/**
 * Provides information about library.
 */
class ClientModule implements ClientModuleInterface
{
    private TonContext $_context;

    /**
     * ClientModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return ClientModuleAsyncInterface Async version of client module interface.
     */
    public function async(): ClientModuleAsyncInterface
    {
        return new AsyncClientModule($this->_context);
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
