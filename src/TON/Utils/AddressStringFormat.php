<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use InvalidArgumentException;
use JsonSerializable;

abstract class AddressStringFormat implements JsonSerializable
{
    public static function create(?array $dto): ?AddressStringFormat
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'AccountId') return new AddressStringFormat_AccountId($dto);
        if ($dto['type'] === 'Hex') return new AddressStringFormat_Hex($dto);
        if ($dto['type'] === 'Base64') return new AddressStringFormat_Base64($dto);
        throw new InvalidArgumentException("Unsupported AddressStringFormat type: {$dto['type']}");
    }
}
