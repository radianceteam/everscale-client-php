<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfSign implements JsonSerializable
{
    /** Signed data combined with signature encoded in `base64`. */
    private string $_signed;

    /** Signature encoded in `hex`. */
    private string $_signature;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signed = $dto['signed'] ?? '';
        $this->_signature = $dto['signature'] ?? '';
    }

    /**
     * Signed data combined with signature encoded in `base64`.
     */
    public function getSigned(): string
    {
        return $this->_signed;
    }

    /**
     * Signature encoded in `hex`.
     */
    public function getSignature(): string
    {
        return $this->_signature;
    }

    /**
     * Signed data combined with signature encoded in `base64`.
     */
    public function setSigned(string $signed): self
    {
        $this->_signed = $signed;
        return $this;
    }

    /**
     * Signature encoded in `hex`.
     */
    public function setSignature(string $signature): self
    {
        $this->_signature = $signature;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_signed !== null) $result['signed'] = $this->_signed;
        if ($this->_signature !== null) $result['signature'] = $this->_signature;
        return $result;
    }
}
