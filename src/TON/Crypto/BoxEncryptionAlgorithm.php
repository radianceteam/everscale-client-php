<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class BoxEncryptionAlgorithm implements JsonSerializable
{
    public static function create(?array $dto): ?BoxEncryptionAlgorithm
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'ChaCha20') return new BoxEncryptionAlgorithm_ChaCha20($dto);
        if ($dto['type'] === 'NaclBox') return new BoxEncryptionAlgorithm_NaclBox($dto);
        if ($dto['type'] === 'NaclSecretBox') return new BoxEncryptionAlgorithm_NaclSecretBox($dto);
        throw new InvalidArgumentException("Unsupported BoxEncryptionAlgorithm type: {$dto['type']}");
    }
}
