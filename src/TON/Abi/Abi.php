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
        if ($dto['type'] === 'Contract') return new Abi_Contract($dto);
        if ($dto['type'] === 'Json') return new Abi_Json($dto);
        if ($dto['type'] === 'Handle') return new Abi_Handle($dto);
        if ($dto['type'] === 'Serialized') return new Abi_Serialized($dto);
        throw new InvalidArgumentException("Unsupported Abi type: {$dto['type']}");
    }
}
