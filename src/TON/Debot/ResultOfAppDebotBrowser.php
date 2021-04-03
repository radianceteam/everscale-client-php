<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use InvalidArgumentException;
use JsonSerializable;

abstract class ResultOfAppDebotBrowser implements JsonSerializable
{
    public static function create(?array $dto): ?ResultOfAppDebotBrowser
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Input') return new ResultOfAppDebotBrowser_Input($dto);
        if ($dto['type'] === 'GetSigningBox') return new ResultOfAppDebotBrowser_GetSigningBox($dto);
        if ($dto['type'] === 'InvokeDebot') return new ResultOfAppDebotBrowser_InvokeDebot($dto);
        if ($dto['type'] === 'Approve') return new ResultOfAppDebotBrowser_Approve($dto);
        throw new InvalidArgumentException("Unsupported ResultOfAppDebotBrowser type: {$dto['type']}");
    }
}
