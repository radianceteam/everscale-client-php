<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfHDKeyXPrvFromMnemonic implements JsonSerializable
{
    /** Serialized extended master private key */
    private string $_xprv;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_xprv = $dto['xprv'] ?? '';
    }

    /**
     * Serialized extended master private key
     */
    public function getXprv(): string
    {
        return $this->_xprv;
    }

    /**
     * Serialized extended master private key
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
        return !empty($result) ? $result : new stdClass();
    }
}
