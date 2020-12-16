<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot\Async;

use TON\AsyncResult;
use TON\Debot\ParamsOfExecute;
use TON\Debot\ParamsOfFetch;
use TON\Debot\ParamsOfStart;
use TON\Debot\RegisteredDebot;
use TON\TonContext;

/**
 * [UNSTABLE](UNSTABLE.md) Module for working with debot.
 */
class AsyncDebotModule implements DebotModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncDebotModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * [UNSTABLE](UNSTABLE.md) Starts an instance of debot.
     *
     *  Downloads debot smart contract from blockchain and switches it to
     *  context zero.
     *  Returns a debot handle which can be used later in `execute` function.
     *  This function must be used by Debot Browser to start a dialog with debot.
     *  While the function is executing, several Browser Callbacks can be called,
     *  since the debot tries to display all actions from the context 0 to the user.
     *
     *  # Remarks
     *  `start` is equivalent to `fetch` + switch to context 0.
     * @param ParamsOfStart $params
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredDebot
     */
    public function startAsync(ParamsOfStart $params, callable $callback): AsyncRegisteredDebot
    {
        return new AsyncRegisteredDebot($this->_context->callFunctionAsync('debot.start', $params, $callback));
    }

    /**
     * [UNSTABLE](UNSTABLE.md) Fetches debot from blockchain.
     *
     *  Downloads debot smart contract (code and data) from blockchain and creates
     *  an instance of Debot Engine for it.
     *
     *  # Remarks
     *  It does not switch debot to context 0. Browser Callbacks are not called.
     * @param ParamsOfFetch $params
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredDebot
     */
    public function fetchAsync(ParamsOfFetch $params, callable $callback): AsyncRegisteredDebot
    {
        return new AsyncRegisteredDebot($this->_context->callFunctionAsync('debot.fetch', $params, $callback));
    }

    /**
     * [UNSTABLE](UNSTABLE.md) Executes debot action.
     *
     *  Calls debot engine referenced by debot handle to execute input action.
     *  Calls Debot Browser Callbacks if needed.
     *
     *  # Remarks
     *  Chain of actions can be executed if input action generates a list of subactions.
     * @param ParamsOfExecute $params
     * @return AsyncResult
     */
    public function executeAsync(ParamsOfExecute $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('debot.execute', $params));
    }

    /**
     * [UNSTABLE](UNSTABLE.md) Destroys debot handle.
     *
     *  Removes handle from Client Context and drops debot engine referenced by that handle.
     * @param RegisteredDebot $params
     * @return AsyncResult
     */
    public function removeAsync(RegisteredDebot $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('debot.remove', $params));
    }
}
