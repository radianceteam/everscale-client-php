<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfTonCrc16 implements JsonSerializable
{
    /** Calculated CRC for input data. */
    private int $_crc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_crc = $dto['crc'] ?? 0;
    }

    /**
     * Calculated CRC for input data.
     */
    public function getCrc(): int
    {
        return $this->_crc;
    }

    /**
     * Calculated CRC for input data.
     */
    public function setCrc(int $crc): self
    {
        $this->_crc = $crc;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_crc !== null) $result['crc'] = $this->_crc;
        return $result;
    }
}
