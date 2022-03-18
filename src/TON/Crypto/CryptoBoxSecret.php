<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use InvalidArgumentException;
use JsonSerializable;

abstract class CryptoBoxSecret implements JsonSerializable
{
    public static function create(?array $dto): ?CryptoBoxSecret
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'RandomSeedPhrase') return new CryptoBoxSecret_RandomSeedPhrase($dto);
        if ($dto['type'] === 'PredefinedSeedPhrase') return new CryptoBoxSecret_PredefinedSeedPhrase($dto);
        if ($dto['type'] === 'EncryptedSecret') return new CryptoBoxSecret_EncryptedSecret($dto);
        throw new InvalidArgumentException("Unsupported CryptoBoxSecret type: {$dto['type']}");
    }
}
