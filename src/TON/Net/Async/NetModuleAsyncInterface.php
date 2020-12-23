<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\AsyncResult;
use TON\Net\ParamsOfQuery;
use TON\Net\ParamsOfQueryCollection;
use TON\Net\ParamsOfSubscribeCollection;
use TON\Net\ParamsOfWaitForCollection;
use TON\Net\ResultOfSubscribeCollection;

interface NetModuleAsyncInterface
{
    /**
     * @param ParamsOfQuery $params
     * @return AsyncResultOfQuery
     */
    function queryAsync(ParamsOfQuery $params): AsyncResultOfQuery;

    /**
     * Queries data that satisfies the `filter` conditions,
     * limits the number of returned records and orders them.
     * The projection fields are limited to `result` fields
     * @param ParamsOfQueryCollection $params
     * @return AsyncResultOfQueryCollection
     */
    function queryCollectionAsync(ParamsOfQueryCollection $params): AsyncResultOfQueryCollection;

    /**
     * Triggers only once.
     * If object that satisfies the `filter` conditions
     * already exists - returns it immediately.
     * If not - waits for insert/update of data within the specified `timeout`,
     * and returns it.
     * The projection fields are limited to `result` fields
     * @param ParamsOfWaitForCollection $params
     * @return AsyncResultOfWaitForCollection
     */
    function waitForCollectionAsync(ParamsOfWaitForCollection $params): AsyncResultOfWaitForCollection;

    /**
     * Cancels a subscription specified by its handle.
     * @param ResultOfSubscribeCollection $params
     * @return AsyncResult
     */
    function unsubscribeAsync(ResultOfSubscribeCollection $params): AsyncResult;

    /**
     * Triggers for each insert/update of data
     * that satisfies the `filter` conditions.
     * The projection fields are limited to `result` fields.
     * @param ParamsOfSubscribeCollection $params
     * @return AsyncResultOfSubscribeCollection
     */
    function subscribeCollectionAsync(ParamsOfSubscribeCollection $params): AsyncResultOfSubscribeCollection;

    /**
     * Suspends network module to stop any network activity
     * @return AsyncResult
     */
    function suspendAsync(): AsyncResult;

    /**
     * Resumes network module to enable network activity
     * @return AsyncResult
     */
    function resumeAsync(): AsyncResult;
}
