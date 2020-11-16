<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use InvalidArgumentException;
use JsonSerializable;

abstract class MessageSource implements JsonSerializable
{
    public static function create(?array $dto): ?MessageSource
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Encoded') return new Encoded($dto);
        if ($dto['type'] === 'EncodingParams') return new EncodingParams($dto);
        throw new InvalidArgumentException("Unsupported MessageSource type: {$dto['type']}");
    }
}
