<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;
use stdClass;

class ParamsOfConvertAddress implements JsonSerializable
{
    private string $_address;
    private ?AddressStringFormat $_outputFormat;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_address = $dto['address'] ?? '';
        $this->_outputFormat = isset($dto['output_format']) ? AddressStringFormat::create($dto['output_format']) : null;
    }

    public function getAddress(): string
    {
        return $this->_address;
    }

    public function getOutputFormat(): ?AddressStringFormat
    {
        return $this->_outputFormat;
    }

    /**
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->_address = $address;
        return $this;
    }

    /**
     * @return self
     */
    public function setOutputFormat(?AddressStringFormat $outputFormat): self
    {
        $this->_outputFormat = $outputFormat;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_address !== null) $result['address'] = $this->_address;
        if ($this->_outputFormat !== null) $result['output_format'] = $this->_outputFormat;
        return !empty($result) ? $result : new stdClass();
    }
}
