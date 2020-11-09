<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfHDKeySecretFromXPrv implements JsonSerializable
{
    /** Serialized extended private key */
    private string $_xprv;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_xprv = $dto['xprv'];
    }

    /**
     * Serialized extended private key
     */
    public function getXprv(): string
    {
        return $this->_xprv;
    }

    /**
     * Serialized extended private key
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