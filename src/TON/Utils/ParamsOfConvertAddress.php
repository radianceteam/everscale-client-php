<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;

class ParamsOfConvertAddress implements JsonSerializable
{
    /** Account address in any TON format. */
    private string $_address;

    /** Specify the format to convert to. */
    private AddressStringFormat $_outputFormat;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_address = $dto['address'] ?? '';
        $this->_outputFormat = new AddressStringFormat($dto['output_format'] ?? []);
    }

    /**
     * Account address in any TON format.
     */
    public function getAddress(): string
    {
        return $this->_address;
    }

    /**
     * Specify the format to convert to.
     */
    public function getOutputFormat(): AddressStringFormat
    {
        return $this->_outputFormat;
    }

    /**
     * Account address in any TON format.
     */
    public function setAddress(string $address): self
    {
        $this->_address = $address;
        return $this;
    }

    /**
     * Specify the format to convert to.
     */
    public function setOutputFormat(AddressStringFormat $outputFormat): self
    {
        $this->_outputFormat = $outputFormat;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_address !== null) $result['address'] = $this->_address;
        if ($this->_outputFormat !== null) $result['output_format'] = $this->_outputFormat;
        return $result;
    }
}
