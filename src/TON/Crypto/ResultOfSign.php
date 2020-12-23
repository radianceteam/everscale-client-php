<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfSign implements JsonSerializable
{
    private string $_signed;
    private string $_signature;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signed = $dto['signed'] ?? '';
        $this->_signature = $dto['signature'] ?? '';
    }

    public function getSigned(): string
    {
        return $this->_signed;
    }

    public function getSignature(): string
    {
        return $this->_signature;
    }

    public function setSigned(string $signed): self
    {
        $this->_signed = $signed;
        return $this;
    }

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
        return !empty($result) ? $result : new stdClass();
    }
}
