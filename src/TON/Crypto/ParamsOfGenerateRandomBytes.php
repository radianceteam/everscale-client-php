<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfGenerateRandomBytes implements JsonSerializable
{
    /** Size of random byte array. */
    private int $_length;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_length = $dto['length'];
    }

    /**
     * Size of random byte array.
     */
    public function getLength(): int
    {
        return $this->_length;
    }

    /**
     * Size of random byte array.
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
        return $result;
    }
}
