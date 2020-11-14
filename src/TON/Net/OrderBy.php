<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;

class OrderBy implements JsonSerializable
{
    private string $_path;
    private SortDirection $_direction;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_path = $dto['path'] ?? '';
        $this->_direction = new SortDirection($dto['direction'] ?? []);
    }

    public function getPath(): string
    {
        return $this->_path;
    }

    public function getDirection(): SortDirection
    {
        return $this->_direction;
    }

    public function setPath(string $path): self
    {
        $this->_path = $path;
        return $this;
    }

    public function setDirection(SortDirection $direction): self
    {
        $this->_direction = $direction;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_path !== null) $result['path'] = $this->_path;
        if ($this->_direction !== null) $result['direction'] = $this->_direction;
        return $result;
    }
}
