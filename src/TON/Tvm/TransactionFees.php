<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;

class TransactionFees implements JsonSerializable
{
    private BigInt $_inMsgFwdFee;
    private BigInt $_storageFee;
    private BigInt $_gasFee;
    private BigInt $_outMsgsFwdFee;
    private BigInt $_totalAccountFees;
    private BigInt $_totalOutput;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_inMsgFwdFee = new BigInt($dto['in_msg_fwd_fee'] ?? []);
        $this->_storageFee = new BigInt($dto['storage_fee'] ?? []);
        $this->_gasFee = new BigInt($dto['gas_fee'] ?? []);
        $this->_outMsgsFwdFee = new BigInt($dto['out_msgs_fwd_fee'] ?? []);
        $this->_totalAccountFees = new BigInt($dto['total_account_fees'] ?? []);
        $this->_totalOutput = new BigInt($dto['total_output'] ?? []);
    }

    public function getInMsgFwdFee(): BigInt
    {
        return $this->_inMsgFwdFee;
    }

    public function getStorageFee(): BigInt
    {
        return $this->_storageFee;
    }

    public function getGasFee(): BigInt
    {
        return $this->_gasFee;
    }

    public function getOutMsgsFwdFee(): BigInt
    {
        return $this->_outMsgsFwdFee;
    }

    public function getTotalAccountFees(): BigInt
    {
        return $this->_totalAccountFees;
    }

    public function getTotalOutput(): BigInt
    {
        return $this->_totalOutput;
    }

    public function setInMsgFwdFee(BigInt $inMsgFwdFee): self
    {
        $this->_inMsgFwdFee = $inMsgFwdFee;
        return $this;
    }

    public function setStorageFee(BigInt $storageFee): self
    {
        $this->_storageFee = $storageFee;
        return $this;
    }

    public function setGasFee(BigInt $gasFee): self
    {
        $this->_gasFee = $gasFee;
        return $this;
    }

    public function setOutMsgsFwdFee(BigInt $outMsgsFwdFee): self
    {
        $this->_outMsgsFwdFee = $outMsgsFwdFee;
        return $this;
    }

    public function setTotalAccountFees(BigInt $totalAccountFees): self
    {
        $this->_totalAccountFees = $totalAccountFees;
        return $this;
    }

    public function setTotalOutput(BigInt $totalOutput): self
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
        return $result;
    }
}
