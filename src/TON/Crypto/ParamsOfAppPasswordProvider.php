<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class ParamsOfAppPasswordProvider implements JsonSerializable
{
    public static function create(?array $dto): ?ParamsOfAppPasswordProvider
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'GetPassword') return new ParamsOfAppPasswordProvider_GetPassword($dto);
        throw new InvalidArgumentException("Unsupported ParamsOfAppPasswordProvider type: {$dto['type']}");
    }
}
