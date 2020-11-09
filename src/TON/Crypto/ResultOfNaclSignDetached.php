<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfNaclSignDetached implements JsonSerializable
{
    /** Signature encoded in `hex`. */
    private string $_signature;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_signature = $dto['signature'];
    }

    /**
     * Signature encoded in `hex`.
     */
    public function getSignature(): string
    {
        return $this->_signature;
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
        if ($this->_signature !== null) $result['signature'] = $this->_signature;
        return $result;
    }
}
