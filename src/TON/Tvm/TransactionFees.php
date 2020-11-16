<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use stdClass;

class TransactionFees implements JsonSerializable
{
    private int $_inMsgFwdFee;
    private int $_storageFee;
    private int $_gasFee;
    private int $_outMsgsFwdFee;
    private int $_totalAccountFees;
    private int $_totalOutput;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_inMsgFwdFee = $dto['in_msg_fwd_fee'] ?? 0;
        $this->_storageFee = $dto['storage_fee'] ?? 0;
        $this->_gasFee = $dto['gas_fee'] ?? 0;
        $this->_outMsgsFwdFee = $dto['out_msgs_fwd_fee'] ?? 0;
        $this->_totalAccountFees = $dto['total_account_fees'] ?? 0;
        $this->_totalOutput = $dto['total_output'] ?? 0;
    }

    public function getInMsgFwdFee(): int
    {
        return $this->_inMsgFwdFee;
    }

    public function getStorageFee(): int
    {
        return $this->_storageFee;
    }

    public function getGasFee(): int
    {
        return $this->_gasFee;
    }

    public function getOutMsgsFwdFee(): int
    {
        return $this->_outMsgsFwdFee;
    }

    public function getTotalAccountFees(): int
    {
        return $this->_totalAccountFees;
    }

    public function getTotalOutput(): int
    {
        return $this->_totalOutput;
    }

    public function setInMsgFwdFee(int $inMsgFwdFee): self
    {
        $this->_inMsgFwdFee = $inMsgFwdFee;
        return $this;
    }

    public function setStorageFee(int $storageFee): self
    {
        $this->_storageFee = $storageFee;
        return $this;
    }

    public function setGasFee(int $gasFee): self
    {
        $this->_gasFee = $gasFee;
        return $this;
    }

    public function setOutMsgsFwdFee(int $outMsgsFwdFee): self
    {
        $this->_outMsgsFwdFee = $outMsgsFwdFee;
        return $this;
    }

    public function setTotalAccountFees(int $totalAccountFees): self
    {
        $this->_totalAccountFees = $totalAccountFees;
        return $this;
    }

    public function setTotalOutput(int $totalOutput): self
    {
        $this->_totalOutput = $totalOutput;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_inMsgFwdFee !== null) $result['in_msg_fwd_fee'] = $this->_inMsgFwdFee;
        if ($this->_storageFee !== null) $result['storage_fee'] = $this->_storageFee;
        if ($this->_gasFee !== null) $result['gas_fee'] = $this->_gasFee;
        if ($this->_outMsgsFwdFee !== null) $result['out_msgs_fwd_fee'] = $this->_outMsgsFwdFee;
        if ($this->_totalAccountFees !== null) $result['total_account_fees'] = $this->_totalAccountFees;
        if ($this->_totalOutput !== null) $result['total_output'] = $this->_totalOutput;
        return !empty($result) ? $result : new stdClass();
    }
}
