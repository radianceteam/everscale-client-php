<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfEncodeInternalMessage implements JsonSerializable
{
    private string $_message;
    private string $_address;
    private string $_messageId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_address = $dto['address'] ?? '';
        $this->_messageId = $dto['message_id'] ?? '';
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function getAddress(): string
    {
        return $this->_address;
    }

    public function getMessageId(): string
    {
        return $this->_messageId;
    }

    /**
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->_address = $address;
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

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_address !== null) $result['address'] = $this->_address;
        if ($this->_messageId !== null) $result['message_id'] = $this->_messageId;
        return !empty($result) ? $result : new stdClass();
    }
}
