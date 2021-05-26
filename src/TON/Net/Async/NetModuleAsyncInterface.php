<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net\Async;

use TON\AsyncResult;
use TON\Net\EndpointsSet;
use TON\Net\ParamsOfAggregateCollection;
use TON\Net\ParamsOfBatchQuery;
use TON\Net\ParamsOfFindLastShardBlock;
use TON\Net\ParamsOfQuery;
use TON\Net\ParamsOfQueryCollection;
use TON\Net\ParamsOfQueryCounterparties;
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
     * @param ParamsOfBatchQuery $params
     * @return AsyncResultOfBatchQuery
     */
    function batchQueryAsync(ParamsOfBatchQuery $params): AsyncResultOfBatchQuery;

    /**
     * Queries data that satisfies the `filter` conditions,
     * limits the number of returned records and orders them.
     * The projection fields are limited to `result` fields
     * @param ParamsOfQueryCollection $params
     * @return AsyncResultOfQueryCollection
     */
    function queryCollectionAsync(ParamsOfQueryCollection $params): AsyncResultOfQueryCollection;

    /**
     * Aggregates values from the specified `fields` for records
     * that satisfies the `filter` conditions,
     * @param ParamsOfAggregateCollection $params
     * @return AsyncResultOfAggregateCollection
     */
    function aggregateCollectionAsync(ParamsOfAggregateCollection $params): AsyncResultOfAggregateCollection;

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
     * Triggers for each insert/update of data that satisfies
     * the `filter` conditions.
     * The projection fields are limited to `result` fields.
     *
     * The subscription is a persistent communication channel between
     * client and Free TON Network.
     * All changes in the blockchain will be reflected in realtime.
     * Changes means inserts and updates of the blockchain entities.
     *
     * ### Important Notes on Subscriptions
     *
     * Unfortunately sometimes the connection with the network brakes down.
     * In this situation the library attempts to reconnect to the network.
     * This reconnection sequence can take significant time.
     * All of this time the client is disconnected from the network.
     *
     * Bad news is that all blockchain changes that happened while
     * the client was disconnected are lost.
     *
     * Good news is that the client report errors to the callback when
     * it loses and resumes connection.
     *
     * So, if the lost changes are important to the application then
     * the application must handle these error reports.
     *
     * Library reports errors with `responseType` == 101
     * and the error object passed via `params`.
     *
     * When the library has successfully reconnected
     * the application receives callback with
     * `responseType` == 101 and `params.code` == 614 (NetworkModuleResumed).
     *
     * Application can use several ways to handle this situation:
     * - If application monitors changes for the single blockchain
     * object (for example specific account):  application
     * can perform a query for this object and handle actual data as a
     * regular data from the subscription.
     * - If application monitors sequence of some blockchain objects
     * (for example transactions of the specific account): application must
     * refresh all cached (or visible to user) lists where this sequences presents.
     * @param ParamsOfSubscribeCollection $params
     * @return AsyncResultOfSubscribeCollection
     */
    function subscribeCollectionAsync(ParamsOfSubscribeCollection $params): AsyncResultOfSubscribeCollection;

    /**
     * @return AsyncResult
     */
    function suspendAsync(): AsyncResult;

    /**
     * @return AsyncResult
     */
    function resumeAsync(): AsyncResult;

    /**
     * @param ParamsOfFindLastShardBlock $params
     * @return AsyncResultOfFindLastShardBlock
     */
    function findLastShardBlockAsync(ParamsOfFindLastShardBlock $params): AsyncResultOfFindLastShardBlock;

    /**
     * @return AsyncEndpointsSet
     */
    function fetchEndpointsAsync(): AsyncEndpointsSet;

    /**
     * @param EndpointsSet $params
     * @return AsyncResult
     */
    function setEndpointsAsync(EndpointsSet $params): AsyncResult;

    /**
     * @return AsyncResultOfGetEndpoints
     */
    function getEndpointsAsync(): AsyncResultOfGetEndpoints;

    /**
     * *Attention* this query retrieves data from 'Counterparties' service which is not supported in
     * the opensource version of DApp Server (and will not be supported) as well as in TON OS SE (will be supported in SE in future),
     * but is always accessible via [TON OS Devnet/Mainnet Clouds](https://docs.ton.dev/86757ecb2/p/85c869-networks)
     * @param ParamsOfQueryCounterparties $params
     * @return AsyncResultOfQueryCollection
     */
    function queryCounterpartiesAsync(ParamsOfQueryCounterparties $params): AsyncResultOfQueryCollection;
}
