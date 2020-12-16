<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfAppSigningBox_GetPublicKey extends ResultOfAppSigningBox implements JsonSerializable
{
    /** Signing box public key */
    private string $_publicKey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_publicKey = $dto['public_key'] ?? '';
    }

    /**
     * Signing box public key
     */
    public function getPublicKey(): string
    {
        return $this->_publicKey;
    }

    /**
     * Signing box public key
     */
    public function setPublicKey(string $publicKey): self
    {
        $this->_publicKey = $publicKey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'GetPublicKey'];
        if ($this->_publicKey !== null) $result['public_key'] = $this->_publicKey;
        return !empty($result) ? $result : new stdClass();
    }
}
