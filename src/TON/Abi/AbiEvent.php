<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class AbiEvent implements JsonSerializable
{
    private string $_name;
    private array $_inputs;
    private ?int $_id;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_name = $dto['name'] ?? '';
        $this->_inputs = $dto['inputs'] ?? [];
        $this->_id = $dto['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function getInputs(): array
    {
        return $this->_inputs;
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
        if ($this->_id !== null) $result['id'] = $this->_id;
        return !empty($result) ? $result : new stdClass();
    }
}
