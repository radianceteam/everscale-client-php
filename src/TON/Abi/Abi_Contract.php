<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class Abi_Contract extends Abi implements JsonSerializable
{
    private ?AbiContract $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = isset($dto['value']) ? new AbiContract($dto['value']) : null;
    }

    public function getValue(): ?AbiContract
    {
        return $this->_value;
    }

    public function setValue(?AbiContract $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Contract'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
