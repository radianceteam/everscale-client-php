<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class Signer_None extends Signer implements JsonSerializable
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
