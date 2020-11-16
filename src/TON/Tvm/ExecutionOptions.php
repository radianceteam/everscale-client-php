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
    /** boc with config */
    private ?string $_blockchainConfig;

    /** time that is used as transaction time */
    private ?int $_blockTime;

    /** block logical time */
    private ?int $_blockLt;

    /** transaction logical time */
    private ?int $_transactionLt;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_blockchainConfig = $dto['blockchain_config'] ?? null;
        $this->_blockTime = $dto['block_time'] ?? null;
        $this->_blockLt = $dto['block_lt'] ?? null;
        $this->_transactionLt = $dto['transaction_lt'] ?? null;
    }

    /**
     * boc with config
     */
    public function getBlockchainConfig(): ?string
    {
        return $this->_blockchainConfig;
    }

    /**
     * time that is used as transaction time
     */
    public function getBlockTime(): ?int
    {
        return $this->_blockTime;
    }

    /**
     * block logical time
     */
    public function getBlockLt(): ?int
    {
        return $this->_blockLt;
    }

    /**
     * transaction logical time
     */
    public function getTransactionLt(): ?int
    {
        return $this->_transactionLt;
    }

    /**
     * boc with config
     */
    public function setBlockchainConfig(?string $blockchainConfig): self
    {
        $this->_blockchainConfig = $blockchainConfig;
        return $this;
    }

    /**
     * time that is used as transaction time
     */
    public function setBlockTime(?int $blockTime): self
    {
        $this->_blockTime = $blockTime;
        return $this;
    }

    /**
     * block logical time
     */
    public function setBlockLt(?int $blockLt): self
    {
        $this->_blockLt = $blockLt;
        return $this;
    }

    /**
     * transaction logical time
     */
    public function setTransactionLt(?int $transactionLt): self
    {
        $this->_transactionLt = $transactionLt;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_blockchainConfig !== null) $result['blockchain_config'] = $this->_blockchainConfig;
        if ($this->_blockTime !== null) $result['block_time'] = $this->_blockTime;
        if ($this->_blockLt !== null) $result['block_lt'] = $this->_blockLt;
        if ($this->_transactionLt !== null) $result['transaction_lt'] = $this->_transactionLt;
        return !empty($result) ? $result : new stdClass();
    }
}
