<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use TON\Debot\Async\DebotModuleAsyncInterface;

interface DebotModuleInterface
{
    /**
     * @return DebotModuleAsyncInterface Async version of debot module interface.
     */
    function async(): DebotModuleAsyncInterface;

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
    function start(ParamsOfStart $params);

    /**
     * Downloads DeBot from blockchain and creates and fetches its metadata.
     * @param ParamsOfFetch $params
     * @return ResultOfFetch
     */
    function fetch(ParamsOfFetch $params): ResultOfFetch;

    /**
     * Calls debot engine referenced by debot handle to execute input action.
     * Calls Debot Browser Callbacks if needed.
     *
     * # Remarks
     * Chain of actions can be executed if input action generates a list of subactions.
     * @param ParamsOfExecute $params
     */
    function execute(ParamsOfExecute $params);

    /**
     * Used by Debot Browser to send response on Dinterface call or from other Debots.
     * @param ParamsOfSend $params
     */
    function send(ParamsOfSend $params);

    /**
     * Removes handle from Client Context and drops debot engine referenced by that handle.
     * @param ParamsOfRemove $params
     */
    function remove(ParamsOfRemove $params);
}
