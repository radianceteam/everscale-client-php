<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class AbiContract implements JsonSerializable
{
    private ?int $_ABI_version;
    private ?int $_abiVersion;
    private ?string $_version;
    private ?array $_header;

    /** @var AbiFunction[]|null */
    private ?array $_functions;

    /** @var AbiEvent[]|null */
    private ?array $_events;

    /** @var AbiData[]|null */
    private ?array $_data;

    /** @var AbiParam[]|null */
    private ?array $_fields;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_ABI_version = $dto['ABI version'] ?? null;
        $this->_abiVersion = $dto['abi_version'] ?? null;
        $this->_version = $dto['version'] ?? null;
        $this->_header = $dto['header'] ?? null;
        $this->_functions = isset($dto['functions']) ? array_map(function ($i) { return new AbiFunction($i); }, $dto['functions']) : null;
        $this->_events = isset($dto['events']) ? array_map(function ($i) { return new AbiEvent($i); }, $dto['events']) : null;
        $this->_data = isset($dto['data']) ? array_map(function ($i) { return new AbiData($i); }, $dto['data']) : null;
        $this->_fields = isset($dto['fields']) ? array_map(function ($i) { return new AbiParam($i); }, $dto['fields']) : null;
    }

    public function getABI_version(): ?int
    {
        return $this->_ABI_version;
    }

    public function getAbiVersion(): ?int
    {
        return $this->_abiVersion;
    }

    public function getVersion(): ?string
    {
        return $this->_version;
    }

    public function getHeader(): ?array
    {
        return $this->_header;
    }

    /**
     * @return AbiFunction[]|null
     */
    public function getFunctions(): ?array
    {
        return $this->_functions;
    }

    /**
     * @return AbiEvent[]|null
     */
    public function getEvents(): ?array
    {
        return $this->_events;
    }

    /**
     * @return AbiData[]|null
     */
    public function getData(): ?array
    {
        return $this->_data;
    }

    /**
     * @return AbiParam[]|null
     */
    public function getFields(): ?array
    {
        return $this->_fields;
    }

    /**
     * @return self
     */
    public function setABI_version(?int $ABI_version): self
    {
        $this->_ABI_version = $ABI_version;
        return $this;
    }

    /**
     * @return self
     */
    public function setAbiVersion(?int $abiVersion): self
    {
        $this->_abiVersion = $abiVersion;
        return $this;
    }

    /**
     * @return self
     */
    public function setVersion(?string $version): self
    {
        $this->_version = $version;
        return $this;
    }

    /**
     * @return self
     */
    public function setHeader(?array $header): self
    {
        $this->_header = $header;
        return $this;
    }

    /**
     * @param AbiFunction[]|null $functions
     * @return self
     */
    public function setFunctions(?array $functions): self
    {
        $this->_functions = $functions;
        return $this;
    }

    /**
     * @param AbiEvent[]|null $events
     * @return self
     */
    public function setEvents(?array $events): self
    {
        $this->_events = $events;
        return $this;
    }

    /**
     * @param AbiData[]|null $data
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * @param AbiParam[]|null $fields
     * @return self
     */
    public function setFields(?array $fields): self
    {
        $this->_fields = $fields;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_ABI_version !== null) $result['ABI version'] = $this->_ABI_version;
        if ($this->_abiVersion !== null) $result['abi_version'] = $this->_abiVersion;
        if ($this->_version !== null) $result['version'] = $this->_version;
        if ($this->_header !== null) $result['header'] = $this->_header;
        if ($this->_functions !== null) $result['functions'] = $this->_functions;
        if ($this->_events !== null) $result['events'] = $this->_events;
        if ($this->_data !== null) $result['data'] = $this->_data;
        if ($this->_fields !== null) $result['fields'] = $this->_fields;
        return !empty($result) ? $result : new stdClass();
    }
}
