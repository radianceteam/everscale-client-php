<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class AbiData implements JsonSerializable
{
    private int $_key;
    private string $_name;
    private string $_type;

    /** @var AbiParam[]|null */
    private ?array $_components;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_key = $dto['key'] ?? 0;
        $this->_name = $dto['name'] ?? '';
        $this->_type = $dto['type'] ?? '';
        $this->_components = isset($dto['components']) ? array_map(function ($i) { return new AbiParam($i); }, $dto['components']) : null;
    }

    public function getKey(): int
    {
        return $this->_key;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function getType(): string
    {
        return $this->_type;
    }

    /**
     * @return AbiParam[]|null
     */
    public function getComponents(): ?array
    {
        return $this->_components;
    }

    /**
     * @return self
     */
    public function setKey(int $key): self
    {
        $this->_key = $key;
        return $this;
    }

    /**
     * @return self
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return self
     */
    public function setType(string $type): self
    {
        $this->_type = $type;
        return $this;
    }

    /**
     * @param AbiParam[]|null $components
     * @return self
     */
    public function setComponents(?array $components): self
    {
        $this->_components = $components;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_key !== null) $result['key'] = $this->_key;
        if ($this->_name !== null) $result['name'] = $this->_name;
        if ($this->_type !== null) $result['type'] = $this->_type;
        if ($this->_components !== null) $result['components'] = $this->_components;
        return !empty($result) ? $result : new stdClass();
    }
}
