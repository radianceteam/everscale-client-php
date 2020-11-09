<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfNaclBoxOpen implements JsonSerializable
{
    /** Decrypted data encoded in `base64`. */
    private string $_decrypted;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_decrypted = $dto['decrypted'];
    }

    /**
     * Decrypted data encoded in `base64`.
     */
    public function getDecrypted(): string
    {
        return $this->_decrypted;
    }

    /**
     * Decrypted data encoded in `base64`.
     */
    public function setDecrypted(string $decrypted): self
    {
        $this->_decrypted = $decrypted;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_decrypted !== null) $result['decrypted'] = $this->_decrypted;
        return $result;
    }
}
