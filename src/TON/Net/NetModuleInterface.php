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

    /**
     * @return ResultOfGetEndpoints
     */
    function getEndpoints(): ResultOfGetEndpoints;

    /**
     * *Attention* this query retrieves data from 'Counterparties' service which is not supported in
     * the opensource version of DApp Server (and will not be supported) as well as in TON OS SE (will be supported in SE in future),
     * but is always accessible via [TON OS Devnet/Mainnet Clouds](https://docs.ton.dev/86757ecb2/p/85c869-networks)
     * @param ParamsOfQueryCounterparties $params
     * @return ResultOfQueryCollection
     */
    function queryCounterparties(ParamsOfQueryCounterparties $params): ResultOfQueryCollection;

    /**
     * Performs recursive retrieval of the transactions tree produced by the specific message:
     * in_msg -> dst_transaction -> out_messages -> dst_transaction -> ...
     *
     * All retrieved messages and transactions will be included
     * into `result.messages` and `result.transactions` respectively.
     *
     * The retrieval process will stop when the retrieved transaction count is more than 50.
     *
     * It is guaranteed that each message in `result.messages` has the corresponding transaction
     * in the `result.transactions`.
     *
     * But there are no guaranties that all messages from transactions `out_msgs` are
     * presented in `result.messages`.
     * So the application have to continue retrieval for missing messages if it requires.
     * @param ParamsOfQueryTransactionTree $params
     * @return ResultOfQueryTransactionTree
     */
    function queryTransactionTree(ParamsOfQueryTransactionTree $params): ResultOfQueryTransactionTree;
}
