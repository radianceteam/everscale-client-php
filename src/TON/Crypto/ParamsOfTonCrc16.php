<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfTonCrc16 implements JsonSerializable
{
    /** Encoded with `base64`. */
    private string $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_data = $dto['data'] ?? '';
    }

    /**
     * Encoded with `base64`.
     */
    public function getData(): string
    {
        return $this->_data;
    }

    /**
     * Encoded with `base64`.
     */
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_data !== null) $result['data'] = $this->_data;
        return !empty($result) ? $result : new stdClass();
    }
}
