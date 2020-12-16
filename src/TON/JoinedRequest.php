<?php

namespace TON;

class JoinedRequest
{
    private TonRequest $_request;
    private int $_disconnect;

    /**
     * JoinedRequest constructor.
     * @param TonRequest $request
     * @param int $disconnect
     */
    public function __construct(TonRequest $request, int $disconnect)
    {
        $this->_request = $request;
        $this->_disconnect = $disconnect;
    }

    /**
     * @return TonRequest
     */
    public function getRequest(): TonRequest
    {
        return $this->_request;
    }

    /**
     * @return int
     */
    public function getDisconnect(): int
    {
        return $this->_disconnect;
    }
}