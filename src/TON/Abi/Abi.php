<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use InvalidArgumentException;
use JsonSerializable;

abstract class Abi implements JsonSerializable
{
    public static function create(?array $dto): ?Abi
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Contract') return new Contract($dto);
        if ($dto['type'] === 'Json') return new Json($dto);
        if ($dto['type'] === 'Handle') return new Handle($dto);
        if ($dto['type'] === 'Serialized') return new Serialized($dto);
        throw new InvalidArgumentException("Unsupported Abi type: {$dto['type']}");
    }
}
