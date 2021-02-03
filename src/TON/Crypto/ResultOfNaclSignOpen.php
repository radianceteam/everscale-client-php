<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfNaclSignOpen implements JsonSerializable
{
    private string $_unsigned;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_unsigned = $dto['unsigned'] ?? '';
    }

    public function getUnsigned(): string
    {
        return $this->_unsigned;
    }

    /**
     * @return self
     */
    public function setUnsigned(string $unsigned): self
    {
        $this->_unsigned = $unsigned;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_unsigned !== null) $result['unsigned'] = $this->_unsigned;
        return !empty($result) ? $result : new stdClass();
    }
}
