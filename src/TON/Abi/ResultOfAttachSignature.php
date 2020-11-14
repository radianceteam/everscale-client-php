<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ResultOfAttachSignature implements JsonSerializable
{
    /** Signed message BOC */
    private string $_message;

    /** Message ID */
    private string $_messageId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_messageId = $dto['message_id'] ?? '';
    }

    /**
     * Signed message BOC
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Message ID
     */
    public function getMessageId(): string
    {
        return $this->_messageId;
    }

    /**
     * Signed message BOC
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * Message ID
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
        if ($this->_messageId !== null) $result['message_id'] = $this->_messageId;
        return $result;
    }
}
