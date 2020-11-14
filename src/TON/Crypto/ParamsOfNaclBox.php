<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfNaclBox implements JsonSerializable
{
    /** Data that must be encrypted encoded in `base64`. */
    private string $_decrypted;

    /** Nonce, encoded in `hex` */
    private string $_nonce;

    /** Receiver's public key - unprefixed 0-padded to 64 symbols hex string */
    private string $_theirPublic;

    /** Sender's private key - unprefixed 0-padded to 64 symbols hex string */
    private string $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_decrypted = $dto['decrypted'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
        $this->_theirPublic = $dto['their_public'] ?? '';
        $this->_secret = $dto['secret'] ?? '';
    }

    /**
     * Data that must be encrypted encoded in `base64`.
     */
    public function getDecrypted(): string
    {
        return $this->_decrypted;
    }

    /**
     * Nonce, encoded in `hex`
     */
    public function getNonce(): string
    {
        return $this->_nonce;
    }

    /**
     * Receiver's public key - unprefixed 0-padded to 64 symbols hex string
     */
    public function getTheirPublic(): string
    {
        return $this->_theirPublic;
    }

    /**
     * Sender's private key - unprefixed 0-padded to 64 symbols hex string
     */
    public function getSecret(): string
    {
        return $this->_secret;
    }

    /**
     * Data that must be encrypted encoded in `base64`.
     */
    public function setDecrypted(string $decrypted): self
    {
        $this->_decrypted = $decrypted;
        return $this;
    }

    /**
     * Nonce, encoded in `hex`
     */
    public function setNonce(string $nonce): self
    {
        $this->_nonce = $nonce;
        return $this;
    }

    /**
     * Receiver's public key - unprefixed 0-padded to 64 symbols hex string
     */
    public function setTheirPublic(string $theirPublic): self
    {
        $this->_theirPublic = $theirPublic;
        return $this;
    }

    /**
     * Sender's private key - unprefixed 0-padded to 64 symbols hex string
     */
    public function setSecret(string $secret): self
    {
        $this->_secret = $secret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_decrypted !== null) $result['decrypted'] = $this->_decrypted;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        if ($this->_theirPublic !== null) $result['their_public'] = $this->_theirPublic;
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return $result;
    }
}
