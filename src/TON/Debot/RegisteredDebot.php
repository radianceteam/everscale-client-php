<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class RegisteredDebot implements JsonSerializable
{
    private int $_debotHandle;
    private string $_debotAbi;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_debotHandle = $dto['debot_handle'] ?? 0;
        $this->_debotAbi = $dto['debot_abi'] ?? '';
    }

    public function getDebotHandle(): int
    {
        return $this->_debotHandle;
    }

    public function getDebotAbi(): string
    {
        return $this->_debotAbi;
    }

    /**
     * @return self
     */
    public function setDebotHandle(int $debotHandle): self
    {
        $this->_debotHandle = $debotHandle;
        return $this;
    }

    /**
     * @return self
     */
    public function setDebotAbi(string $debotAbi): self
    {
        $this->_debotAbi = $debotAbi;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_debotHandle !== null) $result['debot_handle'] = $this->_debotHandle;
        if ($this->_debotAbi !== null) $result['debot_abi'] = $this->_debotAbi;
        return !empty($result) ? $result : new stdClass();
    }
}
