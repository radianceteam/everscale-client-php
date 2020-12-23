<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfModularPower implements JsonSerializable
{
    private string $_base;
    private string $_exponent;
    private string $_modulus;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_base = $dto['base'] ?? '';
        $this->_exponent = $dto['exponent'] ?? '';
        $this->_modulus = $dto['modulus'] ?? '';
    }

    public function getBase(): string
    {
        return $this->_base;
    }

    public function getExponent(): string
    {
        return $this->_exponent;
    }

    public function getModulus(): string
    {
        return $this->_modulus;
    }

    public function setBase(string $base): self
    {
        $this->_base = $base;
        return $this;
    }

    public function setExponent(string $exponent): self
    {
        $this->_exponent = $exponent;
        return $this;
    }

    public function setModulus(string $modulus): self
    {
        $this->_modulus = $modulus;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_base !== null) $result['base'] = $this->_base;
        if ($this->_exponent !== null) $result['exponent'] = $this->_exponent;
        if ($this->_modulus !== null) $result['modulus'] = $this->_modulus;
        return !empty($result) ? $result : new stdClass();
    }
}
