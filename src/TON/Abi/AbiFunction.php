<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class AbiFunction implements JsonSerializable
{
    private string $_name;
    private array $_inputs;
    private array $_outputs;
    private int $_id;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_name = $dto['name'];
        $this->_inputs = $dto['inputs'];
        $this->_outputs = $dto['outputs'];
        $this->_id = $dto['id'];
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function getInputs(): array
    {
        return $this->_inputs;
    }

    public function getOutputs(): array
    {
        return $this->_outputs;
    }

    public function getId(): ?int
    {
        return $this->_id;
    }

    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    public function setInputs(array $inputs): self
    {
        $this->_inputs = $inputs;
        return $this;
    }

    public function setOutputs(array $outputs): self
    {
        $this->_outputs = $outputs;
        return $this;
    }

    public function setId(?int $id): self
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
        return $result;
    }
}
