<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class Serialized extends Abi implements JsonSerializable
{
    private AbiContract $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = new AbiContract($dto['value'] ?? []);
    }

    public function getValue(): AbiContract
    {
        return $this->_value;
    }

    public function setValue(AbiContract $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Serialized'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return $result;
    }
}
