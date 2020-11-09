<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;

class ParamsOfRunTvm implements JsonSerializable
{
    /** Input message BOC. Must be encoded as base64. */
    private string $_message;

    /** Account BOC. Must be encoded as base64. */
    private string $_account;

    /** Execution options. */
    private ExecutionOptions $_executionOptions;

    /** Contract ABI for dedcoding output messages */
    private Abi $_abi;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_message = $dto['message'];
        $this->_account = $dto['account'];
        $this->_executionOptions = new ExecutionOptions($dto['execution_options']);
        $this->_abi = new Abi($dto['abi']);
    }

    /**
     * Input message BOC. Must be encoded as base64.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Account BOC. Must be encoded as base64.
     */
    public function getAccount(): string
    {
        return $this->_account;
    }

    /**
     * Execution options.
     */
    public function getExecutionOptions(): ?ExecutionOptions
    {
        return $this->_executionOptions;
    }

    /**
     * Contract ABI for dedcoding output messages
     */
    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Input message BOC. Must be encoded as base64.
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * Account BOC. Must be encoded as base64.
     */
    public function setAccount(string $account): self
    {
        $this->_account = $account;
        return $this;
    }

    /**
     * Execution options.
     */
    public function setExecutionOptions(?ExecutionOptions $executionOptions): self
    {
        $this->_executionOptions = $executionOptions;
        return $this;
    }

    /**
     * Contract ABI for dedcoding output messages
     */
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
        return $result;
    }
}
