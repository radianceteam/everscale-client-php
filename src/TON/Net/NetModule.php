<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use TON\TonContext;

/**
 * Network access.
 */
class NetModule implements NetModuleInterface
{
    private TonContext $_context;

    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Queries collection data
     *
     *  Queries data that satisfies the `filter` conditions,
     *  limits the number of returned records and orders them.
     *  The projection fields are limited to `result` fields
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
     */
    public function waitForCollection(ParamsOfWaitForCollection $params): ResultOfWaitForCollection
    {
        return new ResultOfWaitForCollection($this->_context->callFunction('net.wait_for_collection', $params));
    }

    /**
     * Cancels a subscription
     *
     *  Cancels a subscription specified by its handle.
     */
    public function unsubscribe(ResultOfSubscribeCollection $params): void
    {
        $this->_context->callFunction('net.unsubscribe', $params);
    }

    /**
     * Creates a subscription
     *
     *  Triggers for each insert/update of data
     *  that satisfies the `filter` conditions.
     *  The projection fields are limited to `result` fields.
     */
    public function subscribeCollection(ParamsOfSubscribeCollection $params): ResultOfSubscribeCollection
    {
        return new ResultOfSubscribeCollection($this->_context->callFunction('net.subscribe_collection', $params));
    }
}
