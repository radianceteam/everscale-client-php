<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use stdClass;

class ParamsOfRunGet implements JsonSerializable
{
    private string $_account;
    private string $_functionName;
    private $_input;
    private ?ExecutionOptions $_executionOptions;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_account = $dto['account'] ?? '';
        $this->_functionName = $dto['function_name'] ?? '';
        $this->_input = $dto['input'] ?? null;
        $this->_executionOptions = isset($dto['execution_options']) ? new ExecutionOptions($dto['execution_options']) : null;
    }

    public function getAccount(): string
    {
        return $this->_account;
    }

    public function getFunctionName(): string
    {
        return $this->_functionName;
    }

    public function getInput()
    {
        return $this->_input;
    }

    public function getExecutionOptions(): ?ExecutionOptions
    {
        return $this->_executionOptions;
    }

    public function setAccount(string $account): self
    {
        $this->_account = $account;
        return $this;
    }

    public function setFunctionName(string $functionName): self
    {
        $this->_functionName = $functionName;
        return $this;
    }

    public function setInput($input): self
    {
        $this->_input = $input;
        return $this;
    }

    public function setExecutionOptions(?ExecutionOptions $executionOptions): self
    {
        $this->_executionOptions = $executionOptions;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_functionName !== null) $result['function_name'] = $this->_functionName;
        if ($this->_input !== null) $result['input'] = $this->_input;
        if ($this->_executionOptions !== null) $result['execution_options'] = $this->_executionOptions;
        return !empty($result) ? $result : new stdClass();
    }
}
