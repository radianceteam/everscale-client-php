<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;
use stdClass;

class ResultOfCalcStorageFee implements JsonSerializable
{
    private string $_fee;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_fee = $dto['fee'] ?? '';
    }

    public function getFee(): string
    {
        return $this->_fee;
    }

    /**
     * @return self
     */
    public function setFee(string $fee): self
    {
        $this->_fee = $fee;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_fee !== null) $result['fee'] = $this->_fee;
        return !empty($result) ? $result : new stdClass();
    }
}
