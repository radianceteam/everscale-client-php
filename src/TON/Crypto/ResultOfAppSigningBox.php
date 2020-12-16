<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class ResultOfAppSigningBox implements JsonSerializable
{
    public static function create(?array $dto): ?ResultOfAppSigningBox
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'GetPublicKey') return new ResultOfAppSigningBox_GetPublicKey($dto);
        if ($dto['type'] === 'Sign') return new ResultOfAppSigningBox_Sign($dto);
        throw new InvalidArgumentException("Unsupported ResultOfAppSigningBox type: {$dto['type']}");
    }
}
