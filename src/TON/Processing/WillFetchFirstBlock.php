<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use stdClass;

class WillFetchFirstBlock extends ProcessingEvent implements JsonSerializable
{
    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'WillFetchFirstBlock'];
        return !empty($result) ? $result : new stdClass();
    }
}
