<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfGenerateRandomBytes implements JsonSerializable
{
    private int $_length;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_length = $dto['length'] ?? 0;
    }

    public function getLength(): int
    {
        return $this->_length;
    }

    /**
     * @return self
     */
    public function setLength(int $length): self
    {
        $this->_length = $length;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_length !== null) $result['length'] = $this->_length;
        return !empty($result) ? $result : new stdClass();
    }
}
