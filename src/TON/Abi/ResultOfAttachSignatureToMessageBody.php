<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfAttachSignatureToMessageBody implements JsonSerializable
{
    private string $_body;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_body = $dto['body'] ?? '';
    }

    public function getBody(): string
    {
        return $this->_body;
    }

    public function setBody(string $body): self
    {
        $this->_body = $body;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_body !== null) $result['body'] = $this->_body;
        return !empty($result) ? $result : new stdClass();
    }
}
