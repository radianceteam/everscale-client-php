<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class TransactionNode implements JsonSerializable
{
    private string $_id;
    private string $_inMsg;
    private array $_outMsgs;
    private string $_accountAddr;
    private string $_totalFees;
    private bool $_aborted;
    private ?int $_exitCode;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_id = $dto['id'] ?? '';
        $this->_inMsg = $dto['in_msg'] ?? '';
        $this->_outMsgs = $dto['out_msgs'] ?? [];
        $this->_accountAddr = $dto['account_addr'] ?? '';
        $this->_totalFees = $dto['total_fees'] ?? '';
        $this->_aborted = $dto['aborted'] ?? false;
        $this->_exitCode = $dto['exit_code'] ?? null;
    }

    public function getId(): string
    {
        return $this->_id;
    }

    public function getInMsg(): string
    {
        return $this->_inMsg;
    }

    public function getOutMsgs(): array
    {
        return $this->_outMsgs;
    }

    public function getAccountAddr(): string
    {
        return $this->_accountAddr;
    }

    public function getTotalFees(): string
    {
        return $this->_totalFees;
    }

    public function isAborted(): bool
    {
        return $this->_aborted;
    }

    public function getExitCode(): ?int
    {
        return $this->_exitCode;
    }

    /**
     * @return self
     */
    public function setId(string $id): self
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return self
     */
    public function setInMsg(string $inMsg): self
    {
        $this->_inMsg = $inMsg;
        return $this;
    }

    /**
     * @return self
     */
    public function setOutMsgs(array $outMsgs): self
    {
        $this->_outMsgs = $outMsgs;
        return $this;
    }

    /**
     * @return self
     */
    public function setAccountAddr(string $accountAddr): self
    {
        $this->_accountAddr = $accountAddr;
        return $this;
    }

    /**
     * @return self
     */
    public function setTotalFees(string $totalFees): self
    {
        $this->_totalFees = $totalFees;
        return $this;
    }

    /**
     * @return self
     */
    public function setAborted(bool $aborted): self
    {
        $this->_aborted = $aborted;
        return $this;
    }

    /**
     * @return self
     */
    public function setExitCode(?int $exitCode): self
    {
        $this->_exitCode = $exitCode;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_id !== null) $result['id'] = $this->_id;
        if ($this->_inMsg !== null) $result['in_msg'] = $this->_inMsg;
        if ($this->_outMsgs !== null) $result['out_msgs'] = $this->_outMsgs;
        if ($this->_accountAddr !== null) $result['account_addr'] = $this->_accountAddr;
        if ($this->_totalFees !== null) $result['total_fees'] = $this->_totalFees;
        if ($this->_aborted !== null) $result['aborted'] = $this->_aborted;
        if ($this->_exitCode !== null) $result['exit_code'] = $this->_exitCode;
        return !empty($result) ? $result : new stdClass();
    }
}
