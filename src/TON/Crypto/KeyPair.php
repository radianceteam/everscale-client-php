<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class KeyPair implements JsonSerializable
{
    /** Public key - 64 symbols hex string */
    private string $_public;

    /** Private key - u64 symbols hex string */
    private string $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_public = $dto['public'] ?? '';
        $this->_secret = $dto['secret'] ?? '';
    }

    /**
     * Public key - 64 symbols hex string
     */
    public function getPublic(): string
    {
        return $this->_public;
    }

    /**
     * Private key - u64 symbols hex string
     */
    public function getSecret(): string
    {
        return $this->_secret;
    }

    /**
     * Public key - 64 symbols hex string
     */
    public function setPublic(string $public): self
    {
        $this->_public = $public;
        return $this;
    }

    /**
     * Private key - u64 symbols hex string
     */
    public function setSecret(string $secret): self
    {
        $this->_secret = $secret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_public !== null) $result['public'] = $this->_public;
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return $result;
    }
}
