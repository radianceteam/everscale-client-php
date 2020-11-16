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
    /** Input message BOC. Must be encoded as base64. */
    private string $_message;

    /** Account to run on executor */
    private ?AccountForExecutor $_account;

    /** Execution options. */
    private ?ExecutionOptions $_executionOptions;

    /** Contract ABI for decoding output messages */
    private ?Abi $_abi;

    /** Skip transaction check flag */
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
     * Input message BOC. Must be encoded as base64.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Account to run on executor
     */
    public function getAccount(): ?AccountForExecutor
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
     * Contract ABI for decoding output messages
     */
    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Skip transaction check flag
     */
    public function isSkipTransactionCheck(): ?bool
    {
        return $this->_skipTransactionCheck;
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
     * Account to run on executor
     */
    public function setAccount(?AccountForExecutor $account): self
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
     * Contract ABI for decoding output messages
     */
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Skip transaction check flag
     */
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
