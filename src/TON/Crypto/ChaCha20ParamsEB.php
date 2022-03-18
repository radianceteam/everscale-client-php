<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ChaCha20ParamsEB implements JsonSerializable
{
    /** Must be encoded with `hex`. */
    private string $_key;

    /** Must be encoded with `hex`. */
    private string $_nonce;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_key = $dto['key'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
    }

    /**
     * Must be encoded with `hex`.
     */
    public function getKey(): string
    {
        return $this->_key;
    }

    /**
     * Must be encoded with `hex`.
     */
    public function getNonce(): string
    {
        return $this->_nonce;
    }

    /**
     * Must be encoded with `hex`.
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->_key = $key;
        return $this;
    }

    /**
     * Must be encoded with `hex`.
     * @return self
     */
    public function setNonce(string $nonce): self
    {
        $this->_nonce = $nonce;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_key !== null) $result['key'] = $this->_key;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        return !empty($result) ? $result : new stdClass();
    }
}
