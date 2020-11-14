<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfHDKeyDeriveFromXPrvPath implements JsonSerializable
{
    /** Serialized extended private key */
    private string $_xprv;

    /** Derivation path, for instance "m/44'/396'/0'/0/0" */
    private string $_path;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_xprv = $dto['xprv'] ?? '';
        $this->_path = $dto['path'] ?? '';
    }

    /**
     * Serialized extended private key
     */
    public function getXprv(): string
    {
        return $this->_xprv;
    }

    /**
     * Derivation path, for instance "m/44'/396'/0'/0/0"
     */
    public function getPath(): string
    {
        return $this->_path;
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
     * Derivation path, for instance "m/44'/396'/0'/0/0"
     */
    public function setPath(string $path): self
    {
        $this->_path = $path;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_xprv !== null) $result['xprv'] = $this->_xprv;
        if ($this->_path !== null) $result['path'] = $this->_path;
        return $result;
    }
}
