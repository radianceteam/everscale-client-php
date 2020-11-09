<?php

namespace TON\Client;

use TON\TonContext;

class ClientImpl implements ClientInterface
{
    protected TonContext $_context;

    /**
     * ClientImpl constructor.
     * @param TonContext $_context
     */
    public function __construct(TonContext $_context)
    {
        $this->_context = $_context;
    }

    function version(): ResultOfVersion
    {
        return new ResultOfVersion($this->_context->callFunction('client.version'));
    }
}