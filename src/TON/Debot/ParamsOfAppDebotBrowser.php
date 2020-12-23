<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use InvalidArgumentException;
use JsonSerializable;

abstract class ParamsOfAppDebotBrowser implements JsonSerializable
{
    public static function create(?array $dto): ?ParamsOfAppDebotBrowser
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Log') return new ParamsOfAppDebotBrowser_Log($dto);
        if ($dto['type'] === 'Switch') return new ParamsOfAppDebotBrowser_Switch($dto);
        if ($dto['type'] === 'SwitchCompleted') return new ParamsOfAppDebotBrowser_SwitchCompleted($dto);
        if ($dto['type'] === 'ShowAction') return new ParamsOfAppDebotBrowser_ShowAction($dto);
        if ($dto['type'] === 'Input') return new ParamsOfAppDebotBrowser_Input($dto);
        if ($dto['type'] === 'GetSigningBox') return new ParamsOfAppDebotBrowser_GetSigningBox($dto);
        if ($dto['type'] === 'InvokeDebot') return new ParamsOfAppDebotBrowser_InvokeDebot($dto);
        throw new InvalidArgumentException("Unsupported ParamsOfAppDebotBrowser type: {$dto['type']}");
    }
}
