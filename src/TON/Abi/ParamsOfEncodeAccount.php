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
    private ?StateInitSource $_stateInit;
    private ?int $_balance;
    private ?int $_lastTransLt;
    private ?int $_lastPaid;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_stateInit = isset($dto['state_init']) ? StateInitSource::create($dto['state_init']) : null;
        $this->_balance = $dto['balance'] ?? null;
        $this->_lastTransLt = $dto['last_trans_lt'] ?? null;
        $this->_lastPaid = $dto['last_paid'] ?? null;
    }

    public function getStateInit(): ?StateInitSource
    {
        return $this->_stateInit;
    }

    public function getBalance(): ?int
    {
        return $this->_balance;
    }

    public function getLastTransLt(): ?int
    {
        return $this->_lastTransLt;
    }

    public function getLastPaid(): ?int
    {
        return $this->_lastPaid;
    }

    public function setStateInit(?StateInitSource $stateInit): self
    {
        $this->_stateInit = $stateInit;
        return $this;
    }

    public function setBalance(?int $balance): self
    {
        $this->_balance = $balance;
        return $this;
    }

    public function setLastTransLt(?int $lastTransLt): self
    {
        $this->_lastTransLt = $lastTransLt;
        return $this;
    }

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
