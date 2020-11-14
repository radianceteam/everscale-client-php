<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfModularPower implements JsonSerializable
{
    /** `base` argument of calculation. */
    private string $_base;

    /** `exponent` argument of calculation. */
    private string $_exponent;

    /** `modulus` argument of calculation. */
    private string $_modulus;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_base = $dto['base'] ?? '';
        $this->_exponent = $dto['exponent'] ?? '';
        $this->_modulus = $dto['modulus'] ?? '';
    }

    /**
     * `base` argument of calculation.
     */
    public function getBase(): string
    {
        return $this->_base;
    }

    /**
     * `exponent` argument of calculation.
     */
    public function getExponent(): string
    {
        return $this->_exponent;
    }

    /**
     * `modulus` argument of calculation.
     */
    public function getModulus(): string
    {
        return $this->_modulus;
    }

    /**
     * `base` argument of calculation.
     */
    public function setBase(string $base): self
    {
        $this->_base = $base;
        return $this;
    }

    /**
     * `exponent` argument of calculation.
     */
    public function setExponent(string $exponent): self
    {
        $this->_exponent = $exponent;
        return $this;
    }

    /**
     * `modulus` argument of calculation.
     */
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
        return $result;
    }
}
