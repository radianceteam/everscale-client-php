<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ResultOfAppDebotBrowser_InvokeDebot extends ResultOfAppDebotBrowser implements JsonSerializable
{
    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'InvokeDebot'];
        return !empty($result) ? $result : new stdClass();
    }
}
