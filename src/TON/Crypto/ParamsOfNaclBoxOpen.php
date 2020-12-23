<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfNaclBoxOpen implements JsonSerializable
{
    /** Encoded with `base64`. */
    private string $_encrypted;
    private string $_nonce;
    private string $_theirPublic;
    private string $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encrypted = $dto['encrypted'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
        $this->_theirPublic = $dto['their_public'] ?? '';
        $this->_secret = $dto['secret'] ?? '';
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

    public function getTheirPublic(): string
    {
        return $this->_theirPublic;
    }

    public function getSecret(): string
    {
        return $this->_secret;
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

    public function setTheirPublic(string $theirPublic): self
    {
        $this->_theirPublic = $theirPublic;
        return $this;
    }

    public function setSecret(string $secret): self
    {
        $this->_secret = $secret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_encrypted !== null) $result['encrypted'] = $this->_encrypted;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        if ($this->_theirPublic !== null) $result['their_public'] = $this->_theirPublic;
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return !empty($result) ? $result : new stdClass();
    }
}
