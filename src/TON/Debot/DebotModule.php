<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use TON\Debot\Async\AsyncDebotModule;
use TON\Debot\Async\DebotModuleAsyncInterface;
use TON\TonContext;

class DebotModule implements DebotModuleInterface
{
    private TonContext $_context;

    /**
     * DebotModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return DebotModuleAsyncInterface Async version of debot module interface.
     */
    public function async(): DebotModuleAsyncInterface
    {
        return new AsyncDebotModule($this->_context);
    }

    /**
     * Calls debot engine referenced by debot handle to execute input action.
     * Calls Debot Browser Callbacks if needed.
     *
     * # Remarks
     * Chain of actions can be executed if input action generates a list of subactions.
     * @param ParamsOfExecute $params
     */
    public function execute(ParamsOfExecute $params)
    {
        $this->_context->callFunction('debot.execute', $params);
    }

    /**
     * Used by Debot Browser to send response on Dinterface call or from other Debots.
     * @param ParamsOfSend $params
     */
    public function send(ParamsOfSend $params)
    {
        $this->_context->callFunction('debot.send', $params);
    }

    /**
     * Removes handle from Client Context and drops debot engine referenced by that handle.
     * @param RegisteredDebot $params
     */
    public function remove(RegisteredDebot $params)
    {
        $this->_context->callFunction('debot.remove', $params);
    }
}
