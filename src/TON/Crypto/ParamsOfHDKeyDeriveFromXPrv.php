<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfHDKeyDeriveFromXPrv implements JsonSerializable
{
    /** Serialized extended private key */
    private string $_xprv;

    /** Child index (see BIP-0032) */
    private int $_childIndex;

    /** Indicates the derivation of hardened/not-hardened key (see BIP-0032) */
    private bool $_hardened;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_xprv = $dto['xprv'] ?? '';
        $this->_childIndex = $dto['child_index'] ?? 0;
        $this->_hardened = $dto['hardened'] ?? false;
    }

    /**
     * Serialized extended private key
     */
    public function getXprv(): string
    {
        return $this->_xprv;
    }

    /**
     * Child index (see BIP-0032)
     */
    public function getChildIndex(): int
    {
        return $this->_childIndex;
    }

    /**
     * Indicates the derivation of hardened/not-hardened key (see BIP-0032)
     */
    public function isHardened(): bool
    {
        return $this->_hardened;
    }

    /**
     * Serialized extended private key
     */
    public function setXprv(string $xprv): self
    {
        $this->_xprv = $xprv;
        return $this;
    }

    /**
     * Child index (see BIP-0032)
     */
    public function setChildIndex(int $childIndex): self
    {
        $this->_childIndex = $childIndex;
        return $this;
    }

    /**
     * Indicates the derivation of hardened/not-hardened key (see BIP-0032)
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
        return $result;
    }
}
