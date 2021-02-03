<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfFetch implements JsonSerializable
{
    private string $_address;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_address = $dto['address'] ?? '';
    }

    public function getAddress(): string
    {
        return $this->_address;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
