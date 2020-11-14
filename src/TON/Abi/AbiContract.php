<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class AbiContract implements JsonSerializable
{
    private int $_ABIVersion;
    private int $_abiVersion;
    private array $_header;
    private array $_functions;
    private array $_events;
    private array $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_ABIVersion = $dto['ABI version'];
        $this->_abiVersion = $dto['abi_version'];
        $this->_header = $dto['header'];
        $this->_functions = $dto['functions'];
        $this->_events = $dto['events'];
        $this->_data = $dto['data'];
    }

    public function getABIVersion(): ?int
    {
        return $this->_ABIVersion;
    }

    public function getAbiVersion(): ?int
    {
        return $this->_abiVersion;
    }

    public function getHeader(): ?array
    {
        return $this->_header;
    }

    public function getFunctions(): ?array
    {
        return $this->_functions;
    }

    public function getEvents(): ?array
    {
        return $this->_events;
    }

    public function getData(): ?array
    {
        return $this->_data;
    }

    public function setABIVersion(?int $ABIVersion): self
    {
        $this->_ABIVersion = $ABIVersion;
        return $this;
    }

    public function setAbiVersion(?int $abiVersion): self
    {
        $this->_abiVersion = $abiVersion;
        return $this;
    }

    public function setHeader(?array $header): self
    {
        $this->_header = $header;
        return $this;
    }

    public function setFunctions(?array $functions): self
    {
        $this->_functions = $functions;
        return $this;
    }

    public function setEvents(?array $events): self
    {
        $this->_events = $events;
        return $this;
    }

    public function setData(?array $data): self
    {
        $this->_data = $data;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_ABIVersion !== null) $result['ABI version'] = $this->_ABIVersion;
        if ($this->_abiVersion !== null) $result['abi_version'] = $this->_abiVersion;
        if ($this->_header !== null) $result['header'] = $this->_header;
        if ($this->_functions !== null) $result['functions'] = $this->_functions;
        if ($this->_events !== null) $result['events'] = $this->_events;
        if ($this->_data !== null) $result['data'] = $this->_data;
        return $result;
    }
}
