<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class AesParams implements JsonSerializable
{
    private string $_mode;
    private string $_key;
    private ?string $_iv;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_mode = $dto['mode'] ?? '';
        $this->_key = $dto['key'] ?? '';
        $this->_iv = $dto['iv'] ?? null;
    }

    public function getMode(): string
    {
        return $this->_mode;
    }

    public function getKey(): string
    {
        return $this->_key;
    }

    public function getIv(): ?string
    {
        return $this->_iv;
    }

    /**
     * @return self
     */
    public function setMode(string $mode): self
    {
        $this->_mode = $mode;
        return $this;
    }

    /**
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->_key = $key;
        return $this;
    }

    /**
     * @return self
     */
    public function setIv(?string $iv): self
    {
        $this->_iv = $iv;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_mode !== null) $result['mode'] = $this->_mode;
        if ($this->_key !== null) $result['key'] = $this->_key;
        if ($this->_iv !== null) $result['iv'] = $this->_iv;
        return !empty($result) ? $result : new stdClass();
    }
}
