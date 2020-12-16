<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use InvalidArgumentException;
use JsonSerializable;

abstract class AppRequestResult implements JsonSerializable
{
    public static function create(?array $dto): ?AppRequestResult
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Error') return new AppRequestResult_Error($dto);
        if ($dto['type'] === 'Ok') return new AppRequestResult_Ok($dto);
        throw new InvalidArgumentException("Unsupported AppRequestResult type: {$dto['type']}");
    }
}
