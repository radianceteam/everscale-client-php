<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class EncryptionAlgorithm implements JsonSerializable
{
    public static function create(?array $dto): ?EncryptionAlgorithm
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'AES') return new EncryptionAlgorithm_AES($dto);
        throw new InvalidArgumentException("Unsupported EncryptionAlgorithm type: {$dto['type']}");
    }
}
