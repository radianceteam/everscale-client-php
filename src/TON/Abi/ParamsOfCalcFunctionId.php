<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfCalcFunctionId implements JsonSerializable
{
    private ?Abi $_abi;
    private string $_functionName;
    private ?bool $_output;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_functionName = $dto['function_name'] ?? '';
        $this->_output = $dto['output'] ?? null;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getFunctionName(): string
    {
        return $this->_functionName;
    }

    public function isOutput(): ?bool
    {
        return $this->_output;
    }

    /**
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
    public function setFunctionName(string $functionName): self
    {
        $this->_functionName = $functionName;
        return $this;
    }

    /**
     * @return self
     */
    public function setOutput(?bool $output): self
    {
        $this->_output = $output;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_functionName !== null) $result['function_name'] = $this->_functionName;
        if ($this->_output !== null) $result['output'] = $this->_output;
        return !empty($result) ? $result : new stdClass();
    }
}
