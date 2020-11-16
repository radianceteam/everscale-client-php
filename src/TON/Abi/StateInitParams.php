<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class StateInitParams implements JsonSerializable
{
    private ?Abi $_abi;
    private $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_value = $dto['value'] ?? null;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    public function setValue($value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
