<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Proofs;

use JsonSerializable;
use stdClass;

class ParamsOfProofBlockData implements JsonSerializable
{
    private $_block;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_block = $dto['block'] ?? null;
    }

    public function getBlock()
    {
        return $this->_block;
    }

    /**
     * @return self
     */
    public function setBlock($block): self
    {
        $this->_block = $block;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_block !== null) $result['block'] = $this->_block;
        return !empty($result) ? $result : new stdClass();
    }
}
