<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfDecodeInitialData implements JsonSerializable
{
    /** Initial data is decoded if this parameter is provided */
    private ?Abi $_abi;
    private string $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_data = $dto['data'] ?? '';
    }

    /**
     * Initial data is decoded if this parameter is provided
     */
    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getData(): string
    {
        return $this->_data;
    }

    /**
     * Initial data is decoded if this parameter is provided
     * @return self
     */
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * @return self
     */
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_data !== null) $result['data'] = $this->_data;
        return !empty($result) ? $result : new stdClass();
    }
}
