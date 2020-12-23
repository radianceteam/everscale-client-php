<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfVerifySignature implements JsonSerializable
{
    private string $_signed;
    private string $_public;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signed = $dto['signed'] ?? '';
        $this->_public = $dto['public'] ?? '';
    }

    public function getSigned(): string
    {
        return $this->_signed;
    }

    public function getPublic(): string
    {
        return $this->_public;
    }

    public function setSigned(string $signed): self
    {
        $this->_signed = $signed;
        return $this;
    }

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
        return !empty($result) ? $result : new stdClass();
    }
}
