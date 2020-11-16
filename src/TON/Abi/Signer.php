<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use InvalidArgumentException;
use JsonSerializable;

abstract class Signer implements JsonSerializable
{
    public static function create(?array $dto): ?Signer
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'None') return new None($dto);
        if ($dto['type'] === 'External') return new External($dto);
        if ($dto['type'] === 'Keys') return new Keys($dto);
        if ($dto['type'] === 'SigningBox') return new SigningBox($dto);
        throw new InvalidArgumentException("Unsupported Signer type: {$dto['type']}");
    }
}
