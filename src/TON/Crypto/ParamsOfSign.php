<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfSign implements JsonSerializable
{
    /** Data that must be signed encoded in `base64`. */
    private string $_unsigned;

    /** Sign keys. */
    private KeyPair $_keys;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_unsigned = $dto['unsigned'];
        $this->_keys = new KeyPair($dto['keys']);
    }

    /**
     * Data that must be signed encoded in `base64`.
     */
    public function getUnsigned(): string
    {
        return $this->_unsigned;
    }

    /**
     * Sign keys.
     */
    public function getKeys(): KeyPair
    {
        return $this->_keys;
    }

    /**
     * Data that must be signed encoded in `base64`.
     */
    public function setUnsigned(string $unsigned): self
    {
        $this->_unsigned = $unsigned;
        return $this;
    }

    /**
     * Sign keys.
     */
    public function setKeys(KeyPair $keys): self
    {
        $this->_keys = $keys;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_unsigned !== null) $result['unsigned'] = $this->_unsigned;
        if ($this->_keys !== null) $result['keys'] = $this->_keys;
        return $result;
    }
}
