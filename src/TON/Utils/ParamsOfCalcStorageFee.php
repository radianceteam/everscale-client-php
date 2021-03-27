<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;
use stdClass;

class ParamsOfCalcStorageFee implements JsonSerializable
{
    private string $_account;
    private int $_period;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_account = $dto['account'] ?? '';
        $this->_period = $dto['period'] ?? 0;
    }

    public function getAccount(): string
    {
        return $this->_account;
    }

    public function getPeriod(): int
    {
        return $this->_period;
    }

    /**
     * @return self
     */
    public function setAccount(string $account): self
    {
        $this->_account = $account;
        return $this;
    }

    /**
     * @return self
     */
    public function setPeriod(int $period): self
    {
        $this->_period = $period;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_period !== null) $result['period'] = $this->_period;
        return !empty($result) ? $result : new stdClass();
    }
}
