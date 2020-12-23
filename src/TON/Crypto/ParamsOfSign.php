<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfSign implements JsonSerializable
{
    private string $_unsigned;
    private ?KeyPair $_keys;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_unsigned = $dto['unsigned'] ?? '';
        $this->_keys = isset($dto['keys']) ? new KeyPair($dto['keys']) : null;
    }

    public function getUnsigned(): string
    {
        return $this->_unsigned;
    }

    public function getKeys(): ?KeyPair
    {
        return $this->_keys;
    }

    public function setUnsigned(string $unsigned): self
    {
        $this->_unsigned = $unsigned;
        return $this;
    }

    public function setKeys(?KeyPair $keys): self
    {
        $this->_keys = $keys;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_unsigned !== null) $result['unsigned'] = $this->_unsigned;
        if ($this->_keys !== null) $result['keys'] = $this->_keys;
        return !empty($result) ? $result : new stdClass();
    }
}
