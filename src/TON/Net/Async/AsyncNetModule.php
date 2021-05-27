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
use TON\Net\ParamsOfQueryTransactionTree;
use TON\Net\ParamsOfSubscribeCollection;
use TON\Net\ParamsOfWaitForCollection;
use TON\Net\ResultOfSubscribeCollection;
use TON\TonContext;

class AsyncNetModule implements NetModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncNetModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @param ParamsOfQuery $params
     * @return AsyncResultOfQuery
     */
    public function queryAsync(ParamsOfQuery $params): AsyncResultOfQuery
    {
        return new AsyncResultOfQuery($this->_context->callFunctionAsync('net.query', $params));
    }

    /**
     * @param ParamsOfBatchQuery $params
     * @return AsyncResultOfBatchQuery
     */
    public function batchQueryAsync(ParamsOfBatchQuery $params): AsyncResultOfBatchQuery
    {
        return new AsyncResultOfBatchQuery($this->_context->callFunctionAsync('net.batch_query', $params));
    }

    /**
     * Queries data that satisfies the `filter` conditions,
     * limits the number of returned records and orders them.
     * The projection fields are limited to `result` fields
     * @param ParamsOfQueryCollection $params
     * @return AsyncResultOfQueryCollection
     */
    public function queryCollectionAsync(ParamsOfQueryCollection $params): AsyncResultOfQueryCollection
    {
        return new AsyncResultOfQueryCollection($this->_context->callFunctionAsync('net.query_collection', $params));
    }

    /**
     * Aggregates values from the specified `fields` for records
     * that satisfies the `filter` conditions,
     * @param ParamsOfAggregateCollection $params
     * @return AsyncResultOfAggregateCollection
     */
    public function aggregateCollectionAsync(ParamsOfAggregateCollection $params): AsyncResultOfAggregateCollection
    {
        return new AsyncResultOfAggregateCollection($this->_context->callFunctionAsync('net.aggregate_collection', $params));
    }

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
    public function waitForCollectionAsync(ParamsOfWaitForCollection $params): AsyncResultOfWaitForCollection
    {
        return new AsyncResultOfWaitForCollection($this->_context->callFunctionAsync('net.wait_for_collection', $params));
    }

    /**
     * Cancels a subscription specified by its handle.
     * @param ResultOfSubscribeCollection $params
     * @return AsyncResult
     */
    public function unsubscribeAsync(ResultOfSubscribeCollection $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('net.unsubscribe', $params));
    }

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
    public function subscribeCollectionAsync(ParamsOfSubscribeCollection $params): AsyncResultOfSubscribeCollection
    {
        return new AsyncResultOfSubscribeCollection($this->_context->callFunctionAsync('net.subscribe_collection', $params));
    }

    /**
     * @return AsyncResult
     */
    public function suspendAsync(): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('net.suspend'));
    }

    /**
     * @return AsyncResult
     */
    public function resumeAsync(): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('net.resume'));
    }

    /**
     * @param ParamsOfFindLastShardBlock $params
     * @return AsyncResultOfFindLastShardBlock
     */
    public function findLastShardBlockAsync(ParamsOfFindLastShardBlock $params): AsyncResultOfFindLastShardBlock
    {
        return new AsyncResultOfFindLastShardBlock($this->_context->callFunctionAsync('net.find_last_shard_block', $params));
    }

    /**
     * @return AsyncEndpointsSet
     */
    public function fetchEndpointsAsync(): AsyncEndpointsSet
    {
        return new AsyncEndpointsSet($this->_context->callFunctionAsync('net.fetch_endpoints'));
    }

    /**
     * @param EndpointsSet $params
     * @return AsyncResult
     */
    public function setEndpointsAsync(EndpointsSet $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('net.set_endpoints', $params));
    }

    /**
     * @return AsyncResultOfGetEndpoints
     */
    public function getEndpointsAsync(): AsyncResultOfGetEndpoints
    {
        return new AsyncResultOfGetEndpoints($this->_context->callFunctionAsync('net.get_endpoints'));
    }

    /**
     * *Attention* this query retrieves data from 'Counterparties' service which is not supported in
     * the opensource version of DApp Server (and will not be supported) as well as in TON OS SE (will be supported in SE in future),
     * but is always accessible via [TON OS Devnet/Mainnet Clouds](https://docs.ton.dev/86757ecb2/p/85c869-networks)
     * @param ParamsOfQueryCounterparties $params
     * @return AsyncResultOfQueryCollection
     */
    public function queryCounterpartiesAsync(ParamsOfQueryCounterparties $params): AsyncResultOfQueryCollection
    {
        return new AsyncResultOfQueryCollection($this->_context->callFunctionAsync('net.query_counterparties', $params));
    }

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
     * @return AsyncResultOfQueryTransactionTree
     */
    public function queryTransactionTreeAsync(ParamsOfQueryTransactionTree $params): AsyncResultOfQueryTransactionTree
    {
        return new AsyncResultOfQueryTransactionTree($this->_context->callFunctionAsync('net.query_transaction_tree', $params));
    }
}
