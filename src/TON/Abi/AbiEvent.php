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

    /** @var AbiParam[] */
    private array $_inputs;
    private ?string $_id;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_name = $dto['name'] ?? '';
        $this->_inputs = isset($dto['inputs']) ? array_map(function ($i) { return new AbiParam($i); }, $dto['inputs']) : [];
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
        if ($this->_id !== null) $result['id'] = $this->_id;
        return !empty($result) ? $result : new stdClass();
    }
}
