<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfAppEncryptionBox_GetInfo extends ParamsOfAppEncryptionBox implements JsonSerializable
{
    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'GetInfo'];
        return !empty($result) ? $result : new stdClass();
    }
}
