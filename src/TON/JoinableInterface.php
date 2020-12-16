<?php

namespace TON;

interface JoinableInterface
{
    const DISCONNECT_MANUALLY = 0;
    const DISCONNECT_AFTER_AWAIT = 1;

    function getRequest(): TonRequest;
}