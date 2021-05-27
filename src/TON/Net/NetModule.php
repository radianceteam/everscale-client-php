<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use TON\Net\Async\AsyncNetModule;
use TON\Net\Async\NetModuleAsyncInterface;
use TON\TonContext;

class NetModule implements NetModuleInterface
{
    private TonContext $_context;

    /**
     * NetModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return NetModuleAsyncInterface Async version of net module interface.
     */
    public function async(): NetModuleAsyncInterface
    {
        return new AsyncNetModule($this->_context);
    }

    /**
     * @param ParamsOfQuery $params
     * @return ResultOfQuery
     */
    public function query(ParamsOfQuery $params): ResultOfQuery
    {
        return new ResultOfQuery($this->_context->callFunction('net.query', $params));
    }

    /**
     * @param ParamsOfBatchQuery $params
     * @return ResultOfBatchQuery
     */
    public function batchQuery(ParamsOfBatchQuery $params): ResultOfBatchQuery
    {
        return new ResultOfBatchQuery($this->_context->callFunction('net.batch_query', $params));
    }

    /**
     * Queries data that satisfies the `filter` conditions,
     * limits the number of returned records and orders them.
     * The projection fields are limited to `result` fields
     * @param ParamsOfQueryCollection $params
     * @return ResultOfQueryCollection
     */
    public function queryCollection(ParamsOfQueryCollection $params): ResultOfQueryCollection
    {
        return new ResultOfQueryCollection($this->_context->callFunction('net.query_collection', $params));
    }

    /**
     * Aggregates values from the specified `fields` for records
     * that satisfies the `filter` conditions,
     * @param ParamsOfAggregateCollection $params
     * @return ResultOfAggregateCollection
     */
    public function aggregateCollection(ParamsOfAggregateCollection $params): ResultOfAggregateCollection
    {
        return new ResultOfAggregateCollection($this->_context->callFunction('net.aggregate_collection', $params));
    }

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
    public function waitForCollection(ParamsOfWaitForCollection $params): ResultOfWaitForCollection
    {
        return new ResultOfWaitForCollection($this->_context->callFunction('net.wait_for_collection', $params));
    }

    /**
     * Cancels a subscription specified by its handle.
     * @param ResultOfSubscribeCollection $params
     */
    public function unsubscribe(ResultOfSubscribeCollection $params)
    {
        $this->_context->callFunction('net.unsubscribe', $params);
    }

    public function suspend()
    {
        $this->_context->callFunction('net.suspend');
    }

    public function resume()
    {
        $this->_context->callFunction('net.resume');
    }

    /**
     * @param ParamsOfFindLastShardBlock $params
     * @return ResultOfFindLastShardBlock
     */
    public function findLastShardBlock(ParamsOfFindLastShardBlock $params): ResultOfFindLastShardBlock
    {
        return new ResultOfFindLastShardBlock($this->_context->callFunction('net.find_last_shard_block', $params));
    }

    /**
     * @return EndpointsSet
     */
    public function fetchEndpoints(): EndpointsSet
    {
        return new EndpointsSet($this->_context->callFunction('net.fetch_endpoints'));
    }

    /**
     * @param EndpointsSet $params
     */
    public function setEndpoints(EndpointsSet $params)
    {
        $this->_context->callFunction('net.set_endpoints', $params);
    }

    /**
     * @return ResultOfGetEndpoints
     */
    public function getEndpoints(): ResultOfGetEndpoints
    {
        return new ResultOfGetEndpoints($this->_context->callFunction('net.get_endpoints'));
    }

    /**
     * *Attention* this query retrieves data from 'Counterparties' service which is not supported in
     * the opensource version of DApp Server (and will not be supported) as well as in TON OS SE (will be supported in SE in future),
     * but is always accessible via [TON OS Devnet/Mainnet Clouds](https://docs.ton.dev/86757ecb2/p/85c869-networks)
     * @param ParamsOfQueryCounterparties $params
     * @return ResultOfQueryCollection
     */
    public function queryCounterparties(ParamsOfQueryCounterparties $params): ResultOfQueryCollection
    {
        return new ResultOfQueryCollection($this->_context->callFunction('net.query_counterparties', $params));
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
     * @return ResultOfQueryTransactionTree
     */
    public function queryTransactionTree(ParamsOfQueryTransactionTree $params): ResultOfQueryTransactionTree
    {
        return new ResultOfQueryTransactionTree($this->_context->callFunction('net.query_transaction_tree', $params));
    }
}
