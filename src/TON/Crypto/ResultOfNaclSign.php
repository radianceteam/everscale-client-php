<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfNaclSign implements JsonSerializable
{
    /** Signed data, encoded in `base64`. */
    private string $_signed;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signed = $dto['signed'] ?? '';
    }

    /**
     * Signed data, encoded in `base64`.
     */
    public function getSigned(): string
    {
        return $this->_signed;
    }

    /**
     * Signed data, encoded in `base64`.
     */
    public function setSigned(string $signed): self
    {
        $this->_signed = $signed;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_signed !== null) $result['signed'] = $this->_signed;
        return $result;
    }
}
