<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class ParamsOfAppSigningBox implements JsonSerializable
{
    public static function create(?array $dto): ?ParamsOfAppSigningBox
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'GetPublicKey') return new ParamsOfAppSigningBox_GetPublicKey($dto);
        if ($dto['type'] === 'Sign') return new ParamsOfAppSigningBox_Sign($dto);
        throw new InvalidArgumentException("Unsupported ParamsOfAppSigningBox type: {$dto['type']}");
    }
}
