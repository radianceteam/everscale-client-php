<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class ResultOfAppPasswordProvider implements JsonSerializable
{
    public static function create(?array $dto): ?ResultOfAppPasswordProvider
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'GetPassword') return new ResultOfAppPasswordProvider_GetPassword($dto);
        throw new InvalidArgumentException("Unsupported ResultOfAppPasswordProvider type: {$dto['type']}");
    }
}
