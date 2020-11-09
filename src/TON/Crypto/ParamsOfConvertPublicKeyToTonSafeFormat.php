<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfConvertPublicKeyToTonSafeFormat implements JsonSerializable
{
    /** Public key - 64 symbols hex string */
    private string $_publicKey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_publicKey = $dto['public_key'];
    }

    /**
     * Public key - 64 symbols hex string
     */
    public function getPublicKey(): string
    {
        return $this->_publicKey;
    }

    /**
     * Public key - 64 symbols hex string
     */
    public function setPublicKey(string $publicKey): self
    {
        $this->_publicKey = $publicKey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_publicKey !== null) $result['public_key'] = $this->_publicKey;
        return $result;
    }
}
