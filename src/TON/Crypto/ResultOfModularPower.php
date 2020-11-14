<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfModularPower implements JsonSerializable
{
    /** Result of modular exponentiation */
    private string $_modularPower;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_modularPower = $dto['modular_power'] ?? '';
    }

    /**
     * Result of modular exponentiation
     */
    public function getModularPower(): string
    {
        return $this->_modularPower;
    }

    /**
     * Result of modular exponentiation
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
        return $result;
    }
}
