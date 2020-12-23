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
     * Triggers for each insert/update of data
     * that satisfies the `filter` conditions.
     * The projection fields are limited to `result` fields.
     * @param ParamsOfSubscribeCollection $params
     * @return AsyncResultOfSubscribeCollection
     */
    public function subscribeCollectionAsync(ParamsOfSubscribeCollection $params): AsyncResultOfSubscribeCollection
    {
        return new AsyncResultOfSubscribeCollection($this->_context->callFunctionAsync('net.subscribe_collection', $params));
    }

    /**
     * Suspends network module to stop any network activity
     * @return AsyncResult
     */
    public function suspendAsync(): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('net.suspend'));
    }

    /**
     * Resumes network module to enable network activity
     * @return AsyncResult
     */
    public function resumeAsync(): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('net.resume'));
    }
}
