<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfFactorize implements JsonSerializable
{
    /** Two factors of composite or empty if composite can't be factorized. */
    private array $_factors;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_factors = $dto['factors'] ?? [];
    }

    /**
     * Two factors of composite or empty if composite can't be factorized.
     */
    public function getFactors(): array
    {
        return $this->_factors;
    }

    /**
     * Two factors of composite or empty if composite can't be factorized.
     */
    public function setFactors(array $factors): self
    {
        $this->_factors = $factors;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_factors !== null) $result['factors'] = $this->_factors;
        return $result;
    }
}
