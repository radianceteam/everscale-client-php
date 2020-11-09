<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfFactorize implements JsonSerializable
{
    /** Hexadecimal representation of u64 composite number. */
    private string $_composite;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_composite = $dto['composite'];
    }

    /**
     * Hexadecimal representation of u64 composite number.
     */
    public function getComposite(): string
    {
        return $this->_composite;
    }

    /**
     * Hexadecimal representation of u64 composite number.
     */
    public function setComposite(string $composite): self
    {
        $this->_composite = $composite;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_composite !== null) $result['composite'] = $this->_composite;
        return $result;
    }
}
