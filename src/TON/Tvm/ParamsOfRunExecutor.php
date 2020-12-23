<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use TON\Abi\Abi;
use stdClass;

class ParamsOfRunExecutor implements JsonSerializable
{
    /** Must be encoded as base64. */
    private string $_message;
    private ?AccountForExecutor $_account;
    private ?ExecutionOptions $_executionOptions;
    private ?Abi $_abi;
    private ?bool $_skipTransactionCheck;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_account = isset($dto['account']) ? AccountForExecutor::create($dto['account']) : null;
        $this->_executionOptions = isset($dto['execution_options']) ? new ExecutionOptions($dto['execution_options']) : null;
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_skipTransactionCheck = $dto['skip_transaction_check'] ?? null;
    }

    /**
     * Must be encoded as base64.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    public function getAccount(): ?AccountForExecutor
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

    public function isSkipTransactionCheck(): ?bool
    {
        return $this->_skipTransactionCheck;
    }

    /**
     * Must be encoded as base64.
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function setAccount(?AccountForExecutor $account): self
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

    public function setSkipTransactionCheck(?bool $skipTransactionCheck): self
    {
        $this->_skipTransactionCheck = $skipTransactionCheck;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_executionOptions !== null) $result['execution_options'] = $this->_executionOptions;
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_skipTransactionCheck !== null) $result['skip_transaction_check'] = $this->_skipTransactionCheck;
        return !empty($result) ? $result : new stdClass();
    }
}
