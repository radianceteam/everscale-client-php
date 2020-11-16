<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

/**
 * Network access.
 */
interface NetModuleInterface
{
    /**
     * Queries collection data
     *
     *  Queries data that satisfies the `filter` conditions,
     *  limits the number of returned records and orders them.
     *  The projection fields are limited to `result` fields
     */
    function queryCollection(ParamsOfQueryCollection $params): ResultOfQueryCollection;

    /**
     * Returns an object that fulfills the conditions or waits for its appearance
     *
     *  Triggers only once.
     *  If object that satisfies the `filter` conditions
     *  already exists - returns it immediately.
     *  If not - waits for insert/update of data within the specified `timeout`,
     *  and returns it.
     *  The projection fields are limited to `result` fields
     */
    function waitForCollection(ParamsOfWaitForCollection $params): ResultOfWaitForCollection;

    /**
     * Cancels a subscription
     *
     *  Cancels a subscription specified by its handle.
     */
    function unsubscribe(ResultOfSubscribeCollection $params): void;

    /**
     * Creates a subscription
     *
     *  Triggers for each insert/update of data
     *  that satisfies the `filter` conditions.
     *  The projection fields are limited to `result` fields.
     */
    function subscribeCollection(ParamsOfSubscribeCollection $params): ResultOfSubscribeCollection;
}
