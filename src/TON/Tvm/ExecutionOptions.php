<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use stdClass;

class ExecutionOptions implements JsonSerializable
{
    private ?string $_blockchainConfig;
    private ?int $_blockTime;
    private ?int $_blockLt;
    private ?int $_transactionLt;
    private ?bool $_chksigAlwaysSucceed;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_blockchainConfig = $dto['blockchain_config'] ?? null;
        $this->_blockTime = $dto['block_time'] ?? null;
        $this->_blockLt = $dto['block_lt'] ?? null;
        $this->_transactionLt = $dto['transaction_lt'] ?? null;
        $this->_chksigAlwaysSucceed = $dto['chksig_always_succeed'] ?? null;
    }

    public function getBlockchainConfig(): ?string
    {
        return $this->_blockchainConfig;
    }

    public function getBlockTime(): ?int
    {
        return $this->_blockTime;
    }

    public function getBlockLt(): ?int
    {
        return $this->_blockLt;
    }

    public function getTransactionLt(): ?int
    {
        return $this->_transactionLt;
    }

    public function isChksigAlwaysSucceed(): ?bool
    {
        return $this->_chksigAlwaysSucceed;
    }

    /**
     * @return self
     */
    public function setBlockchainConfig(?string $blockchainConfig): self
    {
        $this->_blockchainConfig = $blockchainConfig;
        return $this;
    }

    /**
     * @return self
     */
    public function setBlockTime(?int $blockTime): self
    {
        $this->_blockTime = $blockTime;
        return $this;
    }

    /**
     * @return self
     */
    public function setBlockLt(?int $blockLt): self
    {
        $this->_blockLt = $blockLt;
        return $this;
    }

    /**
     * @return self
     */
    public function setTransactionLt(?int $transactionLt): self
    {
        $this->_transactionLt = $transactionLt;
        return $this;
    }

    /**
     * @return self
     */
    public function setChksigAlwaysSucceed(?bool $chksigAlwaysSucceed): self
    {
        $this->_chksigAlwaysSucceed = $chksigAlwaysSucceed;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_blockchainConfig !== null) $result['blockchain_config'] = $this->_blockchainConfig;
        if ($this->_blockTime !== null) $result['block_time'] = $this->_blockTime;
        if ($this->_blockLt !== null) $result['block_lt'] = $this->_blockLt;
        if ($this->_transactionLt !== null) $result['transaction_lt'] = $this->_transactionLt;
        if ($this->_chksigAlwaysSucceed !== null) $result['chksig_always_succeed'] = $this->_chksigAlwaysSucceed;
        return !empty($result) ? $result : new stdClass();
    }
}
