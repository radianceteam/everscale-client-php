<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfHDKeyDeriveFromXPrv implements JsonSerializable
{
    private string $_xprv;
    private int $_childIndex;
    private bool $_hardened;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_xprv = $dto['xprv'] ?? '';
        $this->_childIndex = $dto['child_index'] ?? 0;
        $this->_hardened = $dto['hardened'] ?? false;
    }

    public function getXprv(): string
    {
        return $this->_xprv;
    }

    public function getChildIndex(): int
    {
        return $this->_childIndex;
    }

    public function isHardened(): bool
    {
        return $this->_hardened;
    }

    /**
     * @return self
     */
    public function setXprv(string $xprv): self
    {
        $this->_xprv = $xprv;
        return $this;
    }

    /**
     * @return self
     */
    public function setChildIndex(int $childIndex): self
    {
        $this->_childIndex = $childIndex;
        return $this;
    }

    /**
     * @return self
     */
    public function setHardened(bool $hardened): self
    {
        $this->_hardened = $hardened;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_xprv !== null) $result['xprv'] = $this->_xprv;
        if ($this->_childIndex !== null) $result['child_index'] = $this->_childIndex;
        if ($this->_hardened !== null) $result['hardened'] = $this->_hardened;
        return !empty($result) ? $result : new stdClass();
    }
}
