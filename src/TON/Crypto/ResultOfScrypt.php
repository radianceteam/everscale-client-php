<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfScrypt implements JsonSerializable
{
    /** Derived key. Encoded with `hex`. */
    private string $_key;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_key = $dto['key'] ?? '';
    }

    /**
     * Derived key. Encoded with `hex`.
     */
    public function getKey(): string
    {
        return $this->_key;
    }

    /**
     * Derived key. Encoded with `hex`.
     */
    public function setKey(string $key): self
    {
        $this->_key = $key;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_key !== null) $result['key'] = $this->_key;
        return !empty($result) ? $result : new stdClass();
    }
}
