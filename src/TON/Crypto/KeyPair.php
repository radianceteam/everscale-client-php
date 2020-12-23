<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class KeyPair implements JsonSerializable
{
    private string $_public;
    private string $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_public = $dto['public'] ?? '';
        $this->_secret = $dto['secret'] ?? '';
    }

    public function getPublic(): string
    {
        return $this->_public;
    }

    public function getSecret(): string
    {
        return $this->_secret;
    }

    public function setPublic(string $public): self
    {
        $this->_public = $public;
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
        if ($this->_public !== null) $result['public'] = $this->_public;
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return !empty($result) ? $result : new stdClass();
    }
}
