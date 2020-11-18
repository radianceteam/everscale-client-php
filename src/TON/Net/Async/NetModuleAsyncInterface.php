<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\AsyncResult;
use TON\Net\ParamsOfQueryCollection;
use TON\Net\ParamsOfSubscribeCollection;
use TON\Net\ParamsOfWaitForCollection;
use TON\Net\ResultOfSubscribeCollection;

/**
 * Network access.
 */
interface NetModuleAsyncInterface
{
    /**
     * Queries collection data
     *
     *  Queries data that satisfies the `filter` conditions,
     *  limits the number of returned records and orders them.
     *  The projection fields are limited to `result` fields
     */
    function queryCollectionAsync(ParamsOfQueryCollection $params): AsyncResultOfQueryCollection;

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
    function waitForCollectionAsync(ParamsOfWaitForCollection $params): AsyncResultOfWaitForCollection;

    /**
     * Cancels a subscription
     *
     *  Cancels a subscription specified by its handle.
     */
    function unsubscribeAsync(ResultOfSubscribeCollection $params): AsyncResult;

    /**
     * Creates a subscription
     *
     *  Triggers for each insert/update of data
     *  that satisfies the `filter` conditions.
     *  The projection fields are limited to `result` fields.
     */
    function subscribeCollectionAsync(ParamsOfSubscribeCollection $params): AsyncResultOfSubscribeCollection;
}
