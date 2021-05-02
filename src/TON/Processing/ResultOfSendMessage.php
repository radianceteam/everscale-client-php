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

    /**
     * This list id must be used as a parameter of the
     * `wait_for_transaction`.
     */
    private array $_sendingEndpoints;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_shardBlockId = $dto['shard_block_id'] ?? '';
        $this->_sendingEndpoints = $dto['sending_endpoints'] ?? [];
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
     * This list id must be used as a parameter of the
     * `wait_for_transaction`.
     */
    public function getSendingEndpoints(): array
    {
        return $this->_sendingEndpoints;
    }

    /**
     * This block id must be used as a parameter of the
     * `wait_for_transaction`.
     * @return self
     */
    public function setShardBlockId(string $shardBlockId): self
    {
        $this->_shardBlockId = $shardBlockId;
        return $this;
    }

    /**
     * This list id must be used as a parameter of the
     * `wait_for_transaction`.
     * @return self
     */
    public function setSendingEndpoints(array $sendingEndpoints): self
    {
        $this->_sendingEndpoints = $sendingEndpoints;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_shardBlockId !== null) $result['shard_block_id'] = $this->_shardBlockId;
        if ($this->_sendingEndpoints !== null) $result['sending_endpoints'] = $this->_sendingEndpoints;
        return !empty($result) ? $result : new stdClass();
    }
}
