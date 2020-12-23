<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfNaclSecretBoxOpen implements JsonSerializable
{
    /** Encoded with `base64`. */
    private string $_encrypted;
    private string $_nonce;
    private string $_key;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encrypted = $dto['encrypted'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
        $this->_key = $dto['key'] ?? '';
    }

    /**
     * Encoded with `base64`.
     */
    public function getEncrypted(): string
    {
        return $this->_encrypted;
    }

    public function getNonce(): string
    {
        return $this->_nonce;
    }

    public function getKey(): string
    {
        return $this->_key;
    }

    /**
     * Encoded with `base64`.
     */
    public function setEncrypted(string $encrypted): self
    {
        $this->_encrypted = $encrypted;
        return $this;
    }

    public function setNonce(string $nonce): self
    {
        $this->_nonce = $nonce;
        return $this;
    }

    public function setKey(string $key): self
    {
        $this->_key = $key;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_encrypted !== null) $result['encrypted'] = $this->_encrypted;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        if ($this->_key !== null) $result['key'] = $this->_key;
        return !empty($result) ? $result : new stdClass();
    }
}
