<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use stdClass;

class ProcessingEvent_WillFetchNextBlock extends ProcessingEvent implements JsonSerializable
{
    private string $_shardBlockId;
    private string $_messageId;
    private string $_message;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_shardBlockId = $dto['shard_block_id'] ?? '';
        $this->_messageId = $dto['message_id'] ?? '';
        $this->_message = $dto['message'] ?? '';
    }

    public function getShardBlockId(): string
    {
        return $this->_shardBlockId;
    }

    public function getMessageId(): string
    {
        return $this->_messageId;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * @return self
     */
    public function setShardBlockId(string $shardBlockId): self
    {
        $this->_shardBlockId = $shardBlockId;
        return $this;
    }

    /**
     * @return self
     */
    public function setMessageId(string $messageId): self
    {
        $this->_messageId = $messageId;
        return $this;
    }

    /**
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'WillFetchNextBlock'];
        if ($this->_shardBlockId !== null) $result['shard_block_id'] = $this->_shardBlockId;
        if ($this->_messageId !== null) $result['message_id'] = $this->_messageId;
        if ($this->_message !== null) $result['message'] = $this->_message;
        return !empty($result) ? $result : new stdClass();
    }
}
