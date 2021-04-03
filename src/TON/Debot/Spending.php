<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class Spending implements JsonSerializable
{
    private int $_amount;
    private string $_dst;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_amount = $dto['amount'] ?? 0;
        $this->_dst = $dto['dst'] ?? '';
    }

    public function getAmount(): int
    {
        return $this->_amount;
    }

    public function getDst(): string
    {
        return $this->_dst;
    }

    /**
     * @return self
     */
    public function setAmount(int $amount): self
    {
        $this->_amount = $amount;
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

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_amount !== null) $result['amount'] = $this->_amount;
        if ($this->_dst !== null) $result['dst'] = $this->_dst;
        return !empty($result) ? $result : new stdClass();
    }
}
