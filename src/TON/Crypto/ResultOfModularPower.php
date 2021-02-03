<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfModularPower implements JsonSerializable
{
    private string $_modularPower;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_modularPower = $dto['modular_power'] ?? '';
    }

    public function getModularPower(): string
    {
        return $this->_modularPower;
    }

    /**
     * @return self
     */
    public function setModularPower(string $modularPower): self
    {
        $this->_modularPower = $modularPower;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_modularPower !== null) $result['modular_power'] = $this->_modularPower;
        return !empty($result) ? $result : new stdClass();
    }
}
