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
        if ($dto['type'] === 'None') return new Signer_None($dto);
        if ($dto['type'] === 'External') return new Signer_External($dto);
        if ($dto['type'] === 'Keys') return new Signer_Keys($dto);
        if ($dto['type'] === 'SigningBox') return new Signer_SigningBox($dto);
        throw new InvalidArgumentException("Unsupported Signer type: {$dto['type']}");
    }
}
