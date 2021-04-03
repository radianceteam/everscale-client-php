<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class DebotActivity_Transaction extends DebotActivity implements JsonSerializable
{
    private string $_msg;
    private string $_dst;

    /** @var Spending[] */
    private array $_out;
    private int $_fee;
    private bool $_setcode;
    private string $_signkey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_msg = $dto['msg'] ?? '';
        $this->_dst = $dto['dst'] ?? '';
        $this->_out = $dto['out'] ?? [];
        $this->_fee = $dto['fee'] ?? 0;
        $this->_setcode = $dto['setcode'] ?? false;
        $this->_signkey = $dto['signkey'] ?? '';
    }

    public function getMsg(): string
    {
        return $this->_msg;
    }

    public function getDst(): string
    {
        return $this->_dst;
    }

    /**
     * @return Spending[]
     */
    public function getOut(): array
    {
        return $this->_out;
    }

    public function getFee(): int
    {
        return $this->_fee;
    }

    public function isSetcode(): bool
    {
        return $this->_setcode;
    }

    public function getSignkey(): string
    {
        return $this->_signkey;
    }

    /**
     * @return self
     */
    public function setMsg(string $msg): self
    {
        $this->_msg = $msg;
        return $this;
    }

    /**
     * @return self
     */
    public function setDst(string $dst): self
    {
        $this->_dst = $dst;
        return $this;
    }

    /**
     * @param Spending[] $out
     * @return self
     */
    public function setOut(array $out): self
    {
        $this->_out = $out;
        return $this;
    }

    /**
     * @return self
     */
    public function setFee(int $fee): self
    {
        $this->_fee = $fee;
        return $this;
    }

    /**
     * @return self
     */
    public function setSetcode(bool $setcode): self
    {
        $this->_setcode = $setcode;
        return $this;
    }

    /**
     * @return self
     */
    public function setSignkey(string $signkey): self
    {
        $this->_signkey = $signkey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Transaction'];
        if ($this->_msg !== null) $result['msg'] = $this->_msg;
        if ($this->_dst !== null) $result['dst'] = $this->_dst;
        if ($this->_out !== null) $result['out'] = $this->_out;
        if ($this->_fee !== null) $result['fee'] = $this->_fee;
        if ($this->_setcode !== null) $result['setcode'] = $this->_setcode;
        if ($this->_signkey !== null) $result['signkey'] = $this->_signkey;
        return !empty($result) ? $result : new stdClass();
    }
}
