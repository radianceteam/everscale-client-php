<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use TON\Net\Async\AsyncNetModule;
use TON\Net\Async\NetModuleAsyncInterface;
use TON\TonContext;

/**
 * Network access.
 */
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
     * Queries collection data
     *
     *  Queries data that satisfies the `filter` conditions,
     *  limits the number of returned records and orders them.
     *  The projection fields are limited to `result` fields
     * @param ParamsOfQueryCollection $params
     * @return ResultOfQueryCollection
     */
    public function queryCollection(ParamsOfQueryCollection $params): ResultOfQueryCollection
    {
        return new ResultOfQueryCollection($this->_context->callFunction('net.query_collection', $params));
    }

    /**
     * Returns an object that fulfills the conditions or waits for its appearance
     *
     *  Triggers only once.
     *  If object that satisfies the `filter` conditions
     *  already exists - returns it immediately.
     *  If not - waits for insert/update of data within the specified `timeout`,
     *  and returns it.
     *  The projection fields are limited to `result` fields
     * @param ParamsOfWaitForCollection $params
     * @return ResultOfWaitForCollection
     */
    public function waitForCollection(ParamsOfWaitForCollection $params): ResultOfWaitForCollection
    {
        return new ResultOfWaitForCollection($this->_context->callFunction('net.wait_for_collection', $params));
    }

    /**
     * Cancels a subscription
     *
     *  Cancels a subscription specified by its handle.
     * @param ResultOfSubscribeCollection $params
     */
    public function unsubscribe(ResultOfSubscribeCollection $params)
    {
        $this->_context->callFunction('net.unsubscribe', $params);
    }
}
