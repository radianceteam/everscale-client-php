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
    /** Contains the same data as ext_in_msg_fee field */
    private int $_inMsgFwdFee;
    private int $_storageFee;
    private int $_gasFee;

    /** Contains the same data as total_fwd_fees field. Deprecated because of its confusing name, that is not the same with GraphQL API Transaction type's field. */
    private int $_outMsgsFwdFee;

    /** Contains the same data as account_fees field */
    private int $_totalAccountFees;
    private int $_totalOutput;
    private int $_extInMsgFee;
    private int $_totalFwdFees;
    private int $_accountFees;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_inMsgFwdFee = $dto['in_msg_fwd_fee'] ?? 0;
        $this->_storageFee = $dto['storage_fee'] ?? 0;
        $this->_gasFee = $dto['gas_fee'] ?? 0;
        $this->_outMsgsFwdFee = $dto['out_msgs_fwd_fee'] ?? 0;
        $this->_totalAccountFees = $dto['total_account_fees'] ?? 0;
        $this->_totalOutput = $dto['total_output'] ?? 0;
        $this->_extInMsgFee = $dto['ext_in_msg_fee'] ?? 0;
        $this->_totalFwdFees = $dto['total_fwd_fees'] ?? 0;
        $this->_accountFees = $dto['account_fees'] ?? 0;
    }

    /**
     * Contains the same data as ext_in_msg_fee field
     */
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

    /**
     * Contains the same data as total_fwd_fees field. Deprecated because of its confusing name, that is not the same with GraphQL API Transaction type's field.
     */
    public function getOutMsgsFwdFee(): int
    {
        return $this->_outMsgsFwdFee;
    }

    /**
     * Contains the same data as account_fees field
     */
    public function getTotalAccountFees(): int
    {
        return $this->_totalAccountFees;
    }

    public function getTotalOutput(): int
    {
        return $this->_totalOutput;
    }

    public function getExtInMsgFee(): int
    {
        return $this->_extInMsgFee;
    }

    public function getTotalFwdFees(): int
    {
        return $this->_totalFwdFees;
    }

    public function getAccountFees(): int
    {
        return $this->_accountFees;
    }

    /**
     * Contains the same data as ext_in_msg_fee field
     * @return self
     */
    public function setInMsgFwdFee(int $inMsgFwdFee): self
    {
        $this->_inMsgFwdFee = $inMsgFwdFee;
        return $this;
    }

    /**
     * @return self
     */
    public function setStorageFee(int $storageFee): self
    {
        $this->_storageFee = $storageFee;
        return $this;
    }

    /**
     * @return self
     */
    public function setGasFee(int $gasFee): self
    {
        $this->_gasFee = $gasFee;
        return $this;
    }

    /**
     * Contains the same data as total_fwd_fees field. Deprecated because of its confusing name, that is not the same with GraphQL API Transaction type's field.
     * @return self
     */
    public function setOutMsgsFwdFee(int $outMsgsFwdFee): self
    {
        $this->_outMsgsFwdFee = $outMsgsFwdFee;
        return $this;
    }

    /**
     * Contains the same data as account_fees field
     * @return self
     */
    public function setTotalAccountFees(int $totalAccountFees): self
    {
        $this->_totalAccountFees = $totalAccountFees;
        return $this;
    }

    /**
     * @return self
     */
    public function setTotalOutput(int $totalOutput): self
    {
        $this->_totalOutput = $totalOutput;
        return $this;
    }

    /**
     * @return self
     */
    public function setExtInMsgFee(int $extInMsgFee): self
    {
        $this->_extInMsgFee = $extInMsgFee;
        return $this;
    }

    /**
     * @return self
     */
    public function setTotalFwdFees(int $totalFwdFees): self
    {
        $this->_totalFwdFees = $totalFwdFees;
        return $this;
    }

    /**
     * @return self
     */
    public function setAccountFees(int $accountFees): self
    {
        $this->_accountFees = $accountFees;
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
        if ($this->_extInMsgFee !== null) $result['ext_in_msg_fee'] = $this->_extInMsgFee;
        if ($this->_totalFwdFees !== null) $result['total_fwd_fees'] = $this->_totalFwdFees;
        if ($this->_accountFees !== null) $result['account_fees'] = $this->_accountFees;
        return !empty($result) ? $result : new stdClass();
    }
}
