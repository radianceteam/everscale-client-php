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
    public static function create(array $dto): AddressStringFormat
    {
        if ($dto['type'] === 'AccountId') return new AccountId($dto);
        if ($dto['type'] === 'Hex') return new Hex($dto);
        if ($dto['type'] === 'Base64') return new Base64($dto);
        throw new InvalidArgumentException("Unsupported AddressStringFormat type: {$dto['type']}");
    }
}
