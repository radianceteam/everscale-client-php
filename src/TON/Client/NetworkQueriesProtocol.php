<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

final class NetworkQueriesProtocol
{
    /** Each GraphQL query uses separate HTTP request. */
    public const HTTP = 'HTTP';

    /** All GraphQL queries will be served using single web socket connection. */
    public const WS = 'WS';
}
