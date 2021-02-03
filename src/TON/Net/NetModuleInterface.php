<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use TON\Net\Async\NetModuleAsyncInterface;

interface NetModuleInterface
{
    /**
     * @return NetModuleAsyncInterface Async version of net module interface.
     */
    function async(): NetModuleAsyncInterface;

    /**
     * @param ParamsOfQuery $params
     * @return ResultOfQuery
     */
    function query(ParamsOfQuery $params): ResultOfQuery;

    /**
     * @param ParamsOfBatchQuery $params
     * @return ResultOfBatchQuery
     */
    function batchQuery(ParamsOfBatchQuery $params): ResultOfBatchQuery;

    /**
     * Queries data that satisfies the `filter` conditions,
     * limits the number of returned records and orders them.
     * The projection fields are limited to `result` fields
     * @param ParamsOfQueryCollection $params
     * @return ResultOfQueryCollection
     */
    function queryCollection(ParamsOfQueryCollection $params): ResultOfQueryCollection;

    /**
     * Aggregates values from the specified `fields` for records
     * that satisfies the `filter` conditions,
     * @param ParamsOfAggregateCollection $params
     * @return ResultOfAggregateCollection
     */
    function aggregateCollection(ParamsOfAggregateCollection $params): ResultOfAggregateCollection;

    /**
     * Triggers only once.
     * If object that satisfies the `filter` conditions
     * already exists - returns it immediately.
     * If not - waits for insert/update of data within the specified `timeout`,
     * and returns it.
     * The projection fields are limited to `result` fields
     * @param ParamsOfWaitForCollection $params
     * @return ResultOfWaitForCollection
     */
    function waitForCollection(ParamsOfWaitForCollection $params): ResultOfWaitForCollection;

    /**
     * Cancels a subscription specified by its handle.
     * @param ResultOfSubscribeCollection $params
     */
    function unsubscribe(ResultOfSubscribeCollection $params);

    function suspend();

    function resume();

    /**
     * @param ParamsOfFindLastShardBlock $params
     * @return ResultOfFindLastShardBlock
     */
    function findLastShardBlock(ParamsOfFindLastShardBlock $params): ResultOfFindLastShardBlock;

    /**
     * @return EndpointsSet
     */
    function fetchEndpoints(): EndpointsSet;

    /**
     * @param EndpointsSet $params
     */
    function setEndpoints(EndpointsSet $params);
}
