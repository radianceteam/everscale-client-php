<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ResultOfGetBocDepth implements JsonSerializable
{
    private int $_depth;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_depth = $dto['depth'] ?? 0;
    }

    public function getDepth(): int
    {
        return $this->_depth;
    }

    /**
     * @return self
     */
    public function setDepth(int $depth): self
    {
        $this->_depth = $depth;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_depth !== null) $result['depth'] = $this->_depth;
        return !empty($result) ? $result : new stdClass();
    }
}
