<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class ParamsOfAppEncryptionBox implements JsonSerializable
{
    public static function create(?array $dto): ?ParamsOfAppEncryptionBox
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'GetInfo') return new ParamsOfAppEncryptionBox_GetInfo($dto);
        if ($dto['type'] === 'Encrypt') return new ParamsOfAppEncryptionBox_Encrypt($dto);
        if ($dto['type'] === 'Decrypt') return new ParamsOfAppEncryptionBox_Decrypt($dto);
        throw new InvalidArgumentException("Unsupported ParamsOfAppEncryptionBox type: {$dto['type']}");
    }
}
