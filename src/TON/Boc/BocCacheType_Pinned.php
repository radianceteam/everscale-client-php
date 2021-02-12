<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class BocCacheType_Pinned extends BocCacheType implements JsonSerializable
{
    private string $_pin;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_pin = $dto['pin'] ?? '';
    }

    public function getPin(): string
    {
        return $this->_pin;
    }

    /**
     * @return self
     */
    public function setPin(string $pin): self
    {
        $this->_pin = $pin;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Pinned'];
        if ($this->_pin !== null) $result['pin'] = $this->_pin;
        return !empty($result) ? $result : new stdClass();
    }
}
