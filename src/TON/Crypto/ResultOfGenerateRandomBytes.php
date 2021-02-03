<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfGenerateRandomBytes implements JsonSerializable
{
    private string $_bytes;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_bytes = $dto['bytes'] ?? '';
    }

    public function getBytes(): string
    {
        return $this->_bytes;
    }

    /**
     * @return self
     */
    public function setBytes(string $bytes): self
    {
        $this->_bytes = $bytes;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_bytes !== null) $result['bytes'] = $this->_bytes;
        return !empty($result) ? $result : new stdClass();
    }
}
