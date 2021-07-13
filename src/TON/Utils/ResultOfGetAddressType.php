<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;
use stdClass;

class ResultOfGetAddressType implements JsonSerializable
{
    private string $_addressType;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_addressType = $dto['address_type'] ?? '';
    }

    public function getAddressType(): string
    {
        return $this->_addressType;
    }

    /**
     * @return self
     */
    public function setAddressType(string $addressType): self
    {
        $this->_addressType = $addressType;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_addressType !== null) $result['address_type'] = $this->_addressType;
        return !empty($result) ? $result : new stdClass();
    }
}
