<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class ResultOfAppEncryptionBox implements JsonSerializable
{
    public static function create(?array $dto): ?ResultOfAppEncryptionBox
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'GetInfo') return new ResultOfAppEncryptionBox_GetInfo($dto);
        if ($dto['type'] === 'Encrypt') return new ResultOfAppEncryptionBox_Encrypt($dto);
        if ($dto['type'] === 'Decrypt') return new ResultOfAppEncryptionBox_Decrypt($dto);
        throw new InvalidArgumentException("Unsupported ResultOfAppEncryptionBox type: {$dto['type']}");
    }
}
