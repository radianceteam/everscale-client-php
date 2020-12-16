<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use InvalidArgumentException;
use JsonSerializable;

abstract class StateInitSource implements JsonSerializable
{
    public static function create(?array $dto): ?StateInitSource
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Message') return new StateInitSource_Message($dto);
        if ($dto['type'] === 'StateInit') return new StateInitSource_StateInit($dto);
        if ($dto['type'] === 'Tvc') return new StateInitSource_Tvc($dto);
        throw new InvalidArgumentException("Unsupported StateInitSource type: {$dto['type']}");
    }
}
