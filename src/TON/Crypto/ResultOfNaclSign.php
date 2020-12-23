<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfNaclSign implements JsonSerializable
{
    private string $_signed;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signed = $dto['signed'] ?? '';
    }

    public function getSigned(): string
    {
        return $this->_signed;
    }

    public function setSigned(string $signed): self
    {
        $this->_signed = $signed;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_signed !== null) $result['signed'] = $this->_signed;
        return !empty($result) ? $result : new stdClass();
    }
}
