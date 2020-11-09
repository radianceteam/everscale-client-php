<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfNaclSignKeyPairFromSecret implements JsonSerializable
{
    /** Secret key - unprefixed 0-padded to 64 symbols hex string */
    private string $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_secret = $dto['secret'];
    }

    /**
     * Secret key - unprefixed 0-padded to 64 symbols hex string
     */
    public function getSecret(): string
    {
        return $this->_secret;
    }

    /**
     * Secret key - unprefixed 0-padded to 64 symbols hex string
     */
    public function setSecret(string $secret): self
    {
        $this->_secret = $secret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return $result;
    }
}
