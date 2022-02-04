<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use InvalidArgumentException;
use JsonSerializable;

abstract class BuilderOp implements JsonSerializable
{
    public static function create(?array $dto): ?BuilderOp
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'Integer') return new BuilderOp_Integer($dto);
        if ($dto['type'] === 'BitString') return new BuilderOp_BitString($dto);
        if ($dto['type'] === 'Cell') return new BuilderOp_Cell($dto);
        if ($dto['type'] === 'CellBoc') return new BuilderOp_CellBoc($dto);
        if ($dto['type'] === 'Address') return new BuilderOp_Address($dto);
        throw new InvalidArgumentException("Unsupported BuilderOp type: {$dto['type']}");
    }
}
