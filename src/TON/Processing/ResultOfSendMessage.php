<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use stdClass;

class ResultOfSendMessage implements JsonSerializable
{
    /**
     * This block id must be used as a parameter of the
     * `wait_for_transaction`.
     */
    private string $_shardBlockId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_shardBlockId = $dto['shard_block_id'] ?? '';
    }

    /**
     * This block id must be used as a parameter of the
     * `wait_for_transaction`.
     */
    public function getShardBlockId(): string
    {
        return $this->_shardBlockId;
    }

    /**
     * This block id must be used as a parameter of the
     * `wait_for_transaction`.
     */
    public function setShardBlockId(string $shardBlockId): self
    {
        $this->_shardBlockId = $shardBlockId;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_shardBlockId !== null) $result['shard_block_id'] = $this->_shardBlockId;
        return !empty($result) ? $result : new stdClass();
    }
}
