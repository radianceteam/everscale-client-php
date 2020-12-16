<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use stdClass;

class AccountForExecutor_None extends AccountForExecutor implements JsonSerializable
{
    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'None'];
        return !empty($result) ? $result : new stdClass();
    }
}
