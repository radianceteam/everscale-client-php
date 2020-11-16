<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfNaclSecretBox implements JsonSerializable
{
    /** Data that must be encrypted. Encoded with `base64`. */
    private string $_decrypted;

    /** Nonce in `hex` */
    private string $_nonce;

    /** Secret key - unprefixed 0-padded to 64 symbols hex string */
    private string $_key;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_decrypted = $dto['decrypted'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
        $this->_key = $dto['key'] ?? '';
    }

    /**
     * Data that must be encrypted. Encoded with `base64`.
     */
    public function getDecrypted(): string
    {
        return $this->_decrypted;
    }

    /**
     * Nonce in `hex`
     */
    public function getNonce(): string
    {
        return $this->_nonce;
    }

    /**
     * Secret key - unprefixed 0-padded to 64 symbols hex string
     */
    public function getKey(): string
    {
        return $this->_key;
    }

    /**
     * Data that must be encrypted. Encoded with `base64`.
     */
    public function setDecrypted(string $decrypted): self
    {
        $this->_decrypted = $decrypted;
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
     * Secret key - unprefixed 0-padded to 64 symbols hex string
     */
    public function setKey(string $key): self
    {
        $this->_key = $key;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_decrypted !== null) $result['decrypted'] = $this->_decrypted;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        if ($this->_key !== null) $result['key'] = $this->_key;
        return !empty($result) ? $result : new stdClass();
    }
}
