<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use TON\Abi\Abi;
use TON\Boc\BocCacheType;
use stdClass;

class ParamsOfRunTvm implements JsonSerializable
{
    /** Must be encoded as base64. */
    private string $_message;

    /** Must be encoded as base64. */
    private string $_account;
    private ?ExecutionOptions $_executionOptions;
    private ?Abi $_abi;

    /** The BOC intself returned if no cache type provided */
    private ?BocCacheType $_bocCache;

    /** Empty string is returned if the flag is `false` */
    private ?bool $_returnUpdatedAccount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_account = $dto['account'] ?? '';
        $this->_executionOptions = isset($dto['execution_options']) ? new ExecutionOptions($dto['execution_options']) : null;
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_bocCache = isset($dto['boc_cache']) ? BocCacheType::create($dto['boc_cache']) : null;
        $this->_returnUpdatedAccount = $dto['return_updated_account'] ?? null;
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
     * The BOC intself returned if no cache type provided
     */
    public function getBocCache(): ?BocCacheType
    {
        return $this->_bocCache;
    }

    /**
     * Empty string is returned if the flag is `false`
     */
    public function isReturnUpdatedAccount(): ?bool
    {
        return $this->_returnUpdatedAccount;
    }

    /**
     * Must be encoded as base64.
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * Must be encoded as base64.
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
    public function setExecutionOptions(?ExecutionOptions $executionOptions): self
    {
        $this->_executionOptions = $executionOptions;
        return $this;
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
     * The BOC intself returned if no cache type provided
     * @return self
     */
    public function setBocCache(?BocCacheType $bocCache): self
    {
        $this->_bocCache = $bocCache;
        return $this;
    }

    /**
     * Empty string is returned if the flag is `false`
     * @return self
     */
    public function setReturnUpdatedAccount(?bool $returnUpdatedAccount): self
    {
        $this->_returnUpdatedAccount = $returnUpdatedAccount;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_executionOptions !== null) $result['execution_options'] = $this->_executionOptions;
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_bocCache !== null) $result['boc_cache'] = $this->_bocCache;
        if ($this->_returnUpdatedAccount !== null) $result['return_updated_account'] = $this->_returnUpdatedAccount;
        return !empty($result) ? $result : new stdClass();
    }
}
