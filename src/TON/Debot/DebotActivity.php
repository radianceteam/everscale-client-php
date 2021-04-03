<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use InvalidArgumentException;
use JsonSerializable;

abstract class DebotActivity implements JsonSerializable
{
    public static function create(?array $dto): ?DebotActivity
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Transaction') return new DebotActivity_Transaction($dto);
        throw new InvalidArgumentException("Unsupported DebotActivity type: {$dto['type']}");
    }
}
