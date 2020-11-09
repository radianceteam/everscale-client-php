<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfVerifySignature implements JsonSerializable
{
    /** Signed data that must be verified encoded in `base64`. */
    private string $_signed;

    /** Signer's public key - 64 symbols hex string */
    private string $_public;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_signed = $dto['signed'];
        $this->_public = $dto['public'];
    }

    /**
     * Signed data that must be verified encoded in `base64`.
     */
    public function getSigned(): string
    {
        return $this->_signed;
    }

    /**
     * Signer's public key - 64 symbols hex string
     */
    public function getPublic(): string
    {
        return $this->_public;
    }

    /**
     * Signed data that must be verified encoded in `base64`.
     */
    public function setSigned(string $signed): self
    {
        $this->_signed = $signed;
        return $this;
    }

    /**
     * Signer's public key - 64 symbols hex string
     */
    public function setPublic(string $public): self
    {
        $this->_public = $public;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_signed !== null) $result['signed'] = $this->_signed;
        if ($this->_public !== null) $result['public'] = $this->_public;
        return $result;
    }
}
