<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot\Async;

use TON\AsyncResult;
use TON\Debot\ParamsOfExecute;
use TON\Debot\ParamsOfFetch;
use TON\Debot\ParamsOfInit;
use TON\Debot\ParamsOfRemove;
use TON\Debot\ParamsOfSend;
use TON\Debot\ParamsOfStart;

interface DebotModuleAsyncInterface
{
    /**
     * Downloads debot smart contract (code and data) from blockchain and creates
     * an instance of Debot Engine for it.
     *
     * # Remarks
     * It does not switch debot to context 0. Browser Callbacks are not called.
     * @param ParamsOfInit $params
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredDebot
     */
    function initAsync(ParamsOfInit $params, callable $callback): AsyncRegisteredDebot;

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
     * @return AsyncResult
     */
    function startAsync(ParamsOfStart $params): AsyncResult;

    /**
     * Downloads DeBot from blockchain and creates and fetches its metadata.
     * @param ParamsOfFetch $params
     * @return AsyncResultOfFetch
     */
    function fetchAsync(ParamsOfFetch $params): AsyncResultOfFetch;

    /**
     * Calls debot engine referenced by debot handle to execute input action.
     * Calls Debot Browser Callbacks if needed.
     *
     * # Remarks
     * Chain of actions can be executed if input action generates a list of subactions.
     * @param ParamsOfExecute $params
     * @return AsyncResult
     */
    function executeAsync(ParamsOfExecute $params): AsyncResult;

    /**
     * Used by Debot Browser to send response on Dinterface call or from other Debots.
     * @param ParamsOfSend $params
     * @return AsyncResult
     */
    function sendAsync(ParamsOfSend $params): AsyncResult;

    /**
     * Removes handle from Client Context and drops debot engine referenced by that handle.
     * @param ParamsOfRemove $params
     * @return AsyncResult
     */
    function removeAsync(ParamsOfRemove $params): AsyncResult;
}
