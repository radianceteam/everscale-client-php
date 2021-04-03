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
     * Downloads debot smart contract from blockchain and switches it to
     * context zero.
     *
     * This function must be used by Debot Browser to start a dialog with debot.
     * While the function is executing, several Browser Callbacks can be called,
     * since the debot tries to display all actions from the context 0 to the user.
     *
     * When the debot starts SDK registers `BrowserCallbacks` AppObject.
     * Therefore when `debote.remove` is called the debot is being deleted and the callback is called
     * with `finish`=`true` which indicates that it will never be used again.
     * @param ParamsOfStart $params
     */
    public function start(ParamsOfStart $params)
    {
        $this->_context->callFunction('debot.start', $params);
    }

    /**
     * Downloads DeBot from blockchain and creates and fetches its metadata.
     * @param ParamsOfFetch $params
     * @return ResultOfFetch
     */
    public function fetch(ParamsOfFetch $params): ResultOfFetch
    {
        return new ResultOfFetch($this->_context->callFunction('debot.fetch', $params));
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
     * @param ParamsOfRemove $params
     */
    public function remove(ParamsOfRemove $params)
    {
        $this->_context->callFunction('debot.remove', $params);
    }
}
