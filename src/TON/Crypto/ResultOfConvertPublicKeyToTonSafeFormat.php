<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfConvertPublicKeyToTonSafeFormat implements JsonSerializable
{
    /** Public key represented in TON safe format. */
    private string $_tonPublicKey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_tonPublicKey = $dto['ton_public_key'] ?? '';
    }

    /**
     * Public key represented in TON safe format.
     */
    public function getTonPublicKey(): string
    {
        return $this->_tonPublicKey;
    }

    /**
     * Public key represented in TON safe format.
     */
    public function setTonPublicKey(string $tonPublicKey): self
    {
        $this->_tonPublicKey = $tonPublicKey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_tonPublicKey !== null) $result['ton_public_key'] = $this->_tonPublicKey;
        return $result;
    }
}
