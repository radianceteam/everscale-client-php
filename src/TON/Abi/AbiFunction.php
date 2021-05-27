<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class AbiFunction implements JsonSerializable
{
    private string $_name;

    /** @var AbiParam[] */
    private array $_inputs;

    /** @var AbiParam[] */
    private array $_outputs;
    private ?string $_id;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_name = $dto['name'] ?? '';
        $this->_inputs = isset($dto['inputs']) ? array_map(function ($i) { return new AbiParam($i); }, $dto['inputs']) : [];
        $this->_outputs = isset($dto['outputs']) ? array_map(function ($i) { return new AbiParam($i); }, $dto['outputs']) : [];
        $this->_id = $dto['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @return AbiParam[]
     */
    public function getInputs(): array
    {
        return $this->_inputs;
    }

    /**
     * @return AbiParam[]
     */
    public function getOutputs(): array
    {
        return $this->_outputs;
    }

    public function getId(): ?string
    {
        return $this->_id;
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
     * @param AbiParam[] $inputs
     * @return self
     */
    public function setInputs(array $inputs): self
    {
        $this->_inputs = $inputs;
        return $this;
    }

    /**
     * @param AbiParam[] $outputs
     * @return self
     */
    public function setOutputs(array $outputs): self
    {
        $this->_outputs = $outputs;
        return $this;
    }

    /**
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->_id = $id;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_name !== null) $result['name'] = $this->_name;
        if ($this->_inputs !== null) $result['inputs'] = $this->_inputs;
        if ($this->_outputs !== null) $result['outputs'] = $this->_outputs;
        if ($this->_id !== null) $result['id'] = $this->_id;
        return !empty($result) ? $result : new stdClass();
    }
}
