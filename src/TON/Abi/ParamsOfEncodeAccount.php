<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ParamsOfEncodeAccount implements JsonSerializable
{
    /** Source of the account state init. */
    private StateInitSource $_stateInit;

    /** Initial balance. */
    private BigInt $_balance;

    /** Initial value for the `last_trans_lt`. */
    private BigInt $_lastTransLt;

    /** Initial value for the `last_paid`. */
    private int $_lastPaid;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_stateInit = new StateInitSource($dto['state_init']);
        $this->_balance = new BigInt($dto['balance']);
        $this->_lastTransLt = new BigInt($dto['last_trans_lt']);
        $this->_lastPaid = $dto['last_paid'];
    }

    /**
     * Source of the account state init.
     */
    public function getStateInit(): StateInitSource
    {
        return $this->_stateInit;
    }

    /**
     * Initial balance.
     */
    public function getBalance(): ?BigInt
    {
        return $this->_balance;
    }

    /**
     * Initial value for the `last_trans_lt`.
     */
    public function getLastTransLt(): ?BigInt
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
    public function setStateInit(StateInitSource $stateInit): self
    {
        $this->_stateInit = $stateInit;
        return $this;
    }

    /**
     * Initial balance.
     */
    public function setBalance(?BigInt $balance): self
    {
        $this->_balance = $balance;
        return $this;
    }

    /**
     * Initial value for the `last_trans_lt`.
     */
    public function setLastTransLt(?BigInt $lastTransLt): self
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
        return $result;
    }
}
