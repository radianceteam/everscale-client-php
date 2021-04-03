<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ResultOfFetch implements JsonSerializable
{
    private ?DebotInfo $_info;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_info = isset($dto['info']) ? new DebotInfo($dto['info']) : null;
    }

    public function getInfo(): ?DebotInfo
    {
        return $this->_info;
    }

    /**
     * @return self
     */
    public function setInfo(?DebotInfo $info): self
    {
        $this->_info = $info;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_info !== null) $result['info'] = $this->_info;
        return !empty($result) ? $result : new stdClass();
    }
}
