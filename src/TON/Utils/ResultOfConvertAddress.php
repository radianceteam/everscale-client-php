<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;

class ResultOfConvertAddress implements JsonSerializable
{
    /** Address in the specified format */
    private string $_address;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_address = $dto['address'] ?? '';
    }

    /**
     * Address in the specified format
     */
    public function getAddress(): string
    {
        return $this->_address;
    }

    /**
     * Address in the specified format
     */
    public function setAddress(string $address): self
    {
        $this->_address = $address;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_address !== null) $result['address'] = $this->_address;
        return $result;
    }
}
