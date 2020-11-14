<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfHDKeyDeriveFromXPrvPath implements JsonSerializable
{
    /** Derived serialized extended private key */
    private string $_xprv;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_xprv = $dto['xprv'] ?? '';
    }

    /**
     * Derived serialized extended private key
     */
    public function getXprv(): string
    {
        return $this->_xprv;
    }

    /**
     * Derived serialized extended private key
     */
    public function setXprv(string $xprv): self
    {
        $this->_xprv = $xprv;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_xprv !== null) $result['xprv'] = $this->_xprv;
        return $result;
    }
}
