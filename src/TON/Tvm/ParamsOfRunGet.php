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

    /**
     * Default is `false`. Input parameters may use any of lists representations
     * If you receive this error on Web: "Runtime error. Unreachable code should not be executed...",
     * set this flag to true.
     * This may happen, for example, when elector contract contains too many participants
     */
    private ?bool $_tupleListAsArray;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_account = $dto['account'] ?? '';
        $this->_functionName = $dto['function_name'] ?? '';
        $this->_input = $dto['input'] ?? null;
        $this->_executionOptions = isset($dto['execution_options']) ? new ExecutionOptions($dto['execution_options']) : null;
        $this->_tupleListAsArray = $dto['tuple_list_as_array'] ?? null;
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

    /**
     * Default is `false`. Input parameters may use any of lists representations
     * If you receive this error on Web: "Runtime error. Unreachable code should not be executed...",
     * set this flag to true.
     * This may happen, for example, when elector contract contains too many participants
     */
    public function isTupleListAsArray(): ?bool
    {
        return $this->_tupleListAsArray;
    }

    /**
     * @return self
     */
    public function setAccount(string $account): self
    {
        $this->_account = $account;
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
    public function setInput($input): self
    {
        $this->_input = $input;
        return $this;
    }

    /**
     * @return self
     */
    public function setExecutionOptions(?ExecutionOptions $executionOptions): self
    {
        $this->_executionOptions = $executionOptions;
        return $this;
    }

    /**
     * Default is `false`. Input parameters may use any of lists representations
     * If you receive this error on Web: "Runtime error. Unreachable code should not be executed...",
     * set this flag to true.
     * This may happen, for example, when elector contract contains too many participants
     * @return self
     */
    public function setTupleListAsArray(?bool $tupleListAsArray): self
    {
        $this->_tupleListAsArray = $tupleListAsArray;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_functionName !== null) $result['function_name'] = $this->_functionName;
        if ($this->_input !== null) $result['input'] = $this->_input;
        if ($this->_executionOptions !== null) $result['execution_options'] = $this->_executionOptions;
        if ($this->_tupleListAsArray !== null) $result['tuple_list_as_array'] = $this->_tupleListAsArray;
        return !empty($result) ? $result : new stdClass();
    }
}
