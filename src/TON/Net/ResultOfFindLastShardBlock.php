<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfFindLastShardBlock implements JsonSerializable
{
    private string $_blockId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_blockId = $dto['block_id'] ?? '';
    }

    public function getBlockId(): string
    {
        return $this->_blockId;
    }

    public function setBlockId(string $blockId): self
    {
        $this->_blockId = $blockId;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_blockId !== null) $result['block_id'] = $this->_blockId;
        return !empty($result) ? $result : new stdClass();
    }
}
