<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfEncodeAccount implements JsonSerializable
{
    /** Source of the account state init. */
    private ?StateInitSource $_stateInit;

    /** Initial balance. */
    private ?int $_balance;

    /** Initial value for the `last_trans_lt`. */
    private ?int $_lastTransLt;

    /** Initial value for the `last_paid`. */
    private ?int $_lastPaid;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_stateInit = isset($dto['state_init']) ? StateInitSource::create($dto['state_init']) : null;
        $this->_balance = $dto['balance'] ?? null;
        $this->_lastTransLt = $dto['last_trans_lt'] ?? null;
        $this->_lastPaid = $dto['last_paid'] ?? null;
    }

    /**
     * Source of the account state init.
     */
    public function getStateInit(): ?StateInitSource
    {
        return $this->_stateInit;
    }

    /**
     * Initial balance.
     */
    public function getBalance(): ?int
    {
        return $this->_balance;
    }

    /**
     * Initial value for the `last_trans_lt`.
     */
    public function getLastTransLt(): ?int
    {
        return $this->_lastTransLt;
    }

    /**
     * Initial value for the `last_paid`.
     */
    public function getLastPaid(): ?int
    {
        return $this->_lastPaid;
    }

    /**
     * Source of the account state init.
     */
    public function setStateInit(?StateInitSource $stateInit): self
    {
        $this->_stateInit = $stateInit;
        return $this;
    }

    /**
     * Initial balance.
     */
    public function setBalance(?int $balance): self
    {
        $this->_balance = $balance;
        return $this;
    }

    /**
     * Initial value for the `last_trans_lt`.
     */
    public function setLastTransLt(?int $lastTransLt): self
    {
        $this->_lastTransLt = $lastTransLt;
        return $this;
    }

    /**
     * Initial value for the `last_paid`.
     */
    public function setLastPaid(?int $lastPaid): self
    {
        $this->_lastPaid = $lastPaid;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_stateInit !== null) $result['state_init'] = $this->_stateInit;
        if ($this->_balance !== null) $result['balance'] = $this->_balance;
        if ($this->_lastTransLt !== null) $result['last_trans_lt'] = $this->_lastTransLt;
        if ($this->_lastPaid !== null) $result['last_paid'] = $this->_lastPaid;
        return !empty($result) ? $result : new stdClass();
    }
}
