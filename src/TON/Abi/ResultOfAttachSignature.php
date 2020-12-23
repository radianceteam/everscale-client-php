<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfAttachSignature implements JsonSerializable
{
    private string $_message;
    private string $_messageId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_messageId = $dto['message_id'] ?? '';
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function getMessageId(): string
    {
        return $this->_messageId;
    }

    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function setMessageId(string $messageId): self
    {
        $this->_messageId = $messageId;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_messageId !== null) $result['message_id'] = $this->_messageId;
        return !empty($result) ? $result : new stdClass();
    }
}
