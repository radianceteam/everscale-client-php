<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class RegisteredDebot implements JsonSerializable
{
    private int $_debotHandle;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_debotHandle = $dto['debot_handle'] ?? 0;
    }

    public function getDebotHandle(): int
    {
        return $this->_debotHandle;
    }

    public function setDebotHandle(int $debotHandle): self
    {
        $this->_debotHandle = $debotHandle;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_debotHandle !== null) $result['debot_handle'] = $this->_debotHandle;
        return !empty($result) ? $result : new stdClass();
    }
}
