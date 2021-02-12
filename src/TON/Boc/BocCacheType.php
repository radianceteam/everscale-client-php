<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use InvalidArgumentException;
use JsonSerializable;

abstract class BocCacheType implements JsonSerializable
{
    public static function create(?array $dto): ?BocCacheType
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Pinned') return new BocCacheType_Pinned($dto);
        if ($dto['type'] === 'Unpinned') return new BocCacheType_Unpinned($dto);
        throw new InvalidArgumentException("Unsupported BocCacheType type: {$dto['type']}");
    }
}
