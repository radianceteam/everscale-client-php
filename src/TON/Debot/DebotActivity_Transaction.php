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
    private int $_signingBoxHandle;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_msg = $dto['msg'] ?? '';
        $this->_dst = $dto['dst'] ?? '';
        $this->_out = isset($dto['out']) ? array_map(function ($i) { return new Spending($i); }, $dto['out']) : [];
        $this->_fee = $dto['fee'] ?? 0;
        $this->_setcode = $dto['setcode'] ?? false;
        $this->_signkey = $dto['signkey'] ?? '';
        $this->_signingBoxHandle = $dto['signing_box_handle'] ?? 0;
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

    public function getSigningBoxHandle(): int
    {
        return $this->_signingBoxHandle;
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

    /**
     * @return self
     */
    public function setSigningBoxHandle(int $signingBoxHandle): self
    {
        $this->_signingBoxHandle = $signingBoxHandle;
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
        if ($this->_signingBoxHandle !== null) $result['signing_box_handle'] = $this->_signingBoxHandle;
        return !empty($result) ? $result : new stdClass();
    }
}
