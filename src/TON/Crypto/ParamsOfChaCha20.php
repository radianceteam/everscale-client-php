<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfChaCha20 implements JsonSerializable
{
    /** Must be encoded with `base64`. */
    private string $_data;

    /** Must be encoded with `hex`. */
    private string $_key;

    /** Must be encoded with `hex`. */
    private string $_nonce;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_data = $dto['data'] ?? '';
        $this->_key = $dto['key'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
    }

    /**
     * Must be encoded with `base64`.
     */
    public function getData(): string
    {
        return $this->_data;
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
     * Must be encoded with `base64`.
     * @return self
     */
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
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
        if ($this->_data !== null) $result['data'] = $this->_data;
        if ($this->_key !== null) $result['key'] = $this->_key;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        return !empty($result) ? $result : new stdClass();
    }
}
