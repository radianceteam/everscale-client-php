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

    /**
     * Block iterator uses robust iteration methods that guaranties that every
     * block in the specified range isn't missed or iterated twice.
     *
     * Iterated range can be reduced with some filters:
     * - `start_time` – the bottom time range. Only blocks with `gen_utime`
     * more or equal to this value is iterated. If this parameter is omitted then there is
     * no bottom time edge, so all blocks since zero state is iterated.
     * - `end_time` – the upper time range. Only blocks with `gen_utime`
     * less then this value is iterated. If this parameter is omitted then there is
     * no upper time edge, so iterator never finishes.
     * - `shard_filter` – workchains and shard prefixes that reduce the set of interesting
     * blocks. Block conforms to the shard filter if it belongs to the filter workchain
     * and the first bits of block's `shard` fields matches to the shard prefix.
     * Only blocks with suitable shard are iterated.
     *
     * Items iterated is a JSON objects with block data. The minimal set of returned
     * fields is:
     * ```text
     * id
     * gen_utime
     * workchain_id
     * shard
     * after_split
     * after_merge
     * prev_ref {
     *     root_hash
     * }
     * prev_alt_ref {
     *     root_hash
     * }
     * ```
     * Application can request additional fields in the `result` parameter.
     *
     * Application should call the `remove_iterator` when iterator is no longer required.
     * @param ParamsOfCreateBlockIterator $params
     * @return RegisteredIterator
     */
    function createBlockIterator(ParamsOfCreateBlockIterator $params): RegisteredIterator;

    /**
     * The iterator stays exactly at the same position where the `resume_state` was catched.
     *
     * Application should call the `remove_iterator` when iterator is no longer required.
     * @param ParamsOfResumeBlockIterator $params
     * @return RegisteredIterator
     */
    function resumeBlockIterator(ParamsOfResumeBlockIterator $params): RegisteredIterator;

    /**
     * Transaction iterator uses robust iteration methods that guaranty that every
     * transaction in the specified range isn't missed or iterated twice.
     *
     * Iterated range can be reduced with some filters:
     * - `start_time` – the bottom time range. Only transactions with `now`
     * more or equal to this value are iterated. If this parameter is omitted then there is
     * no bottom time edge, so all the transactions since zero state are iterated.
     * - `end_time` – the upper time range. Only transactions with `now`
     * less then this value are iterated. If this parameter is omitted then there is
     * no upper time edge, so iterator never finishes.
     * - `shard_filter` – workchains and shard prefixes that reduce the set of interesting
     * accounts. Account address conforms to the shard filter if
     * it belongs to the filter workchain and the first bits of address match to
     * the shard prefix. Only transactions with suitable account addresses are iterated.
     * - `accounts_filter` – set of account addresses whose transactions must be iterated.
     * Note that accounts filter can conflict with shard filter so application must combine
     * these filters carefully.
     *
     * Iterated item is a JSON objects with transaction data. The minimal set of returned
     * fields is:
     * ```text
     * id
     * account_addr
     * now
     * balance_delta(format:DEC)
     * bounce { bounce_type }
     * in_message {
     *     id
     *     value(format:DEC)
     *     msg_type
     *     src
     * }
     * out_messages {
     *     id
     *     value(format:DEC)
     *     msg_type
     *     dst
     * }
     * ```
     * Application can request an additional fields in the `result` parameter.
     *
     * Another parameter that affects on the returned fields is the `include_transfers`.
     * When this parameter is `true` the iterator computes and adds `transfer` field containing
     * list of the useful `TransactionTransfer` objects.
     * Each transfer is calculated from the particular message related to the transaction
     * and has the following structure:
     * - message – source message identifier.
     * - isBounced – indicates that the transaction is bounced, which means the value will be returned back to the sender.
     * - isDeposit – indicates that this transfer is the deposit (true) or withdraw (false).
     * - counterparty – account address of the transfer source or destination depending on `isDeposit`.
     * - value – amount of nano tokens transferred. The value is represented as a decimal string
     * because the actual value can be more precise than the JSON number can represent. Application
     * must use this string carefully – conversion to number can follow to loose of precision.
     *
     * Application should call the `remove_iterator` when iterator is no longer required.
     * @param ParamsOfCreateTransactionIterator $params
     * @return RegisteredIterator
     */
    function createTransactionIterator(ParamsOfCreateTransactionIterator $params): RegisteredIterator;

    /**
     * The iterator stays exactly at the same position where the `resume_state` was caught.
     * Note that `resume_state` doesn't store the account filter. If the application requires
     * to use the same account filter as it was when the iterator was created then the application
     * must pass the account filter again in `accounts_filter` parameter.
     *
     * Application should call the `remove_iterator` when iterator is no longer required.
     * @param ParamsOfResumeTransactionIterator $params
     * @return RegisteredIterator
     */
    function resumeTransactionIterator(ParamsOfResumeTransactionIterator $params): RegisteredIterator;

    /**
     * In addition to available items this function returns the `has_more` flag
     * indicating that the iterator isn't reach the end of the iterated range yet.
     *
     * This function can return the empty list of available items but
     * indicates that there are more items is available.
     * This situation appears when the iterator doesn't reach iterated range
     * but database doesn't contains available items yet.
     *
     * If application requests resume state in `return_resume_state` parameter
     * then this function returns `resume_state` that can be used later to
     * resume the iteration from the position after returned items.
     *
     * The structure of the items returned depends on the iterator used.
     * See the description to the appropriated iterator creation function.
     * @param ParamsOfIteratorNext $params
     * @return ResultOfIteratorNext
     */
    function iteratorNext(ParamsOfIteratorNext $params): ResultOfIteratorNext;

    /**
     * Frees all resources allocated in library to serve iterator.
     *
     * Application always should call the `remove_iterator` when iterator
     * is no longer required.
     * @param RegisteredIterator $params
     */
    function removeIterator(RegisteredIterator $params);
}
