<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfNaclSign implements JsonSerializable
{
    /** Data that must be signed encoded in `base64`. */
    private string $_unsigned;

    /** Signer's secret key - unprefixed 0-padded to 64 symbols hex string */
    private string $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_unsigned = $dto['unsigned'] ?? '';
        $this->_secret = $dto['secret'] ?? '';
    }

    /**
     * Data that must be signed encoded in `base64`.
     */
    public function getUnsigned(): string
    {
        return $this->_unsigned;
    }

    /**
     * Signer's secret key - unprefixed 0-padded to 64 symbols hex string
     */
    public function getSecret(): string
    {
        return $this->_secret;
    }

    /**
     * Data that must be signed encoded in `base64`.
     */
    public function setUnsigned(string $unsigned): self
    {
        $this->_unsigned = $unsigned;
        return $this;
    }

    /**
     * Signer's secret key - unprefixed 0-padded to 64 symbols hex string
     */
    public function setSecret(string $secret): self
    {
        $this->_secret = $secret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_unsigned !== null) $result['unsigned'] = $this->_unsigned;
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return !empty($result) ? $result : new stdClass();
    }
}
