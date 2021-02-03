<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfFactorize implements JsonSerializable
{
    private array $_factors;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_factors = $dto['factors'] ?? [];
    }

    public function getFactors(): array
    {
        return $this->_factors;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
