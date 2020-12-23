<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use TON\Abi\Abi;
use stdClass;

class ParamsOfRunTvm implements JsonSerializable
{
    /** Must be encoded as base64. */
    private string $_message;

    /** Must be encoded as base64. */
    private string $_account;
    private ?ExecutionOptions $_executionOptions;
    private ?Abi $_abi;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_account = $dto['account'] ?? '';
        $this->_executionOptions = isset($dto['execution_options']) ? new ExecutionOptions($dto['execution_options']) : null;
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
    }

    /**
     * Must be encoded as base64.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Must be encoded as base64.
     */
    public function getAccount(): string
    {
        return $this->_account;
    }

    public function getExecutionOptions(): ?ExecutionOptions
    {
        return $this->_executionOptions;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Must be encoded as base64.
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * Must be encoded as base64.
     */
    public function setAccount(string $account): self
    {
        $this->_account = $account;
        return $this;
    }

    public function setExecutionOptions(?ExecutionOptions $executionOptions): self
    {
        $this->_executionOptions = $executionOptions;
        return $this;
    }

    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_executionOptions !== null) $result['execution_options'] = $this->_executionOptions;
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        return !empty($result) ? $result : new stdClass();
    }
}
