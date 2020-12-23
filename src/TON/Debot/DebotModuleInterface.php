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
     * Calls debot engine referenced by debot handle to execute input action.
     * Calls Debot Browser Callbacks if needed.
     *
     * # Remarks
     * Chain of actions can be executed if input action generates a list of subactions.
     * @param ParamsOfExecute $params
     */
    function execute(ParamsOfExecute $params);

    /**
     * Removes handle from Client Context and drops debot engine referenced by that handle.
     * @param RegisteredDebot $params
     */
    function remove(RegisteredDebot $params);
}
