<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfNaclSecretBoxOpen implements JsonSerializable
{
    /** Data that must be decrypted. Encoded with `base64`. */
    private string $_encrypted;

    /** Nonce in `hex` */
    private string $_nonce;

    /** Public key - unprefixed 0-padded to 64 symbols hex string */
    private string $_key;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_encrypted = $dto['encrypted'];
        $this->_nonce = $dto['nonce'];
        $this->_key = $dto['key'];
    }

    /**
     * Data that must be decrypted. Encoded with `base64`.
     */
    public function getEncrypted(): string
    {
        return $this->_encrypted;
    }

    /**
     * Nonce in `hex`
     */
    public function getNonce(): string
    {
        return $this->_nonce;
    }

    /**
     * Public key - unprefixed 0-padded to 64 symbols hex string
     */
    public function getKey(): string
    {
        return $this->_key;
    }

    /**
     * Data that must be decrypted. Encoded with `base64`.
     */
    public function setEncrypted(string $encrypted): self
    {
        $this->_encrypted = $encrypted;
        return $this;
    }

    /**
     * Nonce in `hex`
     */
    public function setNonce(string $nonce): self
    {
        $this->_nonce = $nonce;
        return $this;
    }

    /**
     * Public key - unprefixed 0-padded to 64 symbols hex string
     */
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
        return $result;
    }
}
