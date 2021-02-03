<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use InvalidArgumentException;
use JsonSerializable;

abstract class ParamsOfQueryOperation implements JsonSerializable
{
    public static function create(?array $dto): ?ParamsOfQueryOperation
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'QueryCollection') return new ParamsOfQueryOperation_QueryCollection($dto);
        if ($dto['type'] === 'WaitForCollection') return new ParamsOfQueryOperation_WaitForCollection($dto);
        if ($dto['type'] === 'AggregateCollection') return new ParamsOfQueryOperation_AggregateCollection($dto);
        throw new InvalidArgumentException("Unsupported ParamsOfQueryOperation type: {$dto['type']}");
    }
}
