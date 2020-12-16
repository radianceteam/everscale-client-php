<?php

namespace TON;

use Generator;

interface EventsInterface
{
    /**
     * @param int $timeout Timeout in millis. -1 means no timeout.
     * @return Generator
     */
    function getEvents(int $timeout = -1): Generator;
}