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
        if ($dto['type'] === 'ChaCha20') return new EncryptionAlgorithm_ChaCha20($dto);
        if ($dto['type'] === 'NaclBox') return new EncryptionAlgorithm_NaclBox($dto);
        if ($dto['type'] === 'NaclSecretBox') return new EncryptionAlgorithm_NaclSecretBox($dto);
        throw new InvalidArgumentException("Unsupported EncryptionAlgorithm type: {$dto['type']}");
    }
}
