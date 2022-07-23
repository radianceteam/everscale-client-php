<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use stdClass;

class ProcessingEvent_RempIncludedIntoBlock extends ProcessingEvent implements JsonSerializable
{
    private string $_messageId;
    private int $_timestamp;
    private $_json;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_messageId = $dto['message_id'] ?? '';
        $this->_timestamp = $dto['timestamp'] ?? 0;
        $this->_json = $dto['json'] ?? null;
    }

    public function getMessageId(): string
    {
        return $this->_messageId;
    }

    public function getTimestamp(): int
    {
        return $this->_timestamp;
    }

    public function getJson()
    {
        return $this->_json;
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
    public function setTimestamp(int $timestamp): self
    {
        $this->_timestamp = $timestamp;
        return $this;
    }

    /**
     * @return self
     */
    public function setJson($json): self
    {
        $this->_json = $json;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'RempIncludedIntoBlock'];
        if ($this->_messageId !== null) $result['message_id'] = $this->_messageId;
        if ($this->_timestamp !== null) $result['timestamp'] = $this->_timestamp;
        if ($this->_json !== null) $result['json'] = $this->_json;
        return !empty($result) ? $result : new stdClass();
    }
}
