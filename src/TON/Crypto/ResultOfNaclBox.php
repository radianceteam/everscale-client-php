<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfNaclBox implements JsonSerializable
{
    /** Encrypted data encoded in `base64`. */
    private string $_encrypted;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encrypted = $dto['encrypted'] ?? '';
    }

    /**
     * Encrypted data encoded in `base64`.
     */
    public function getEncrypted(): string
    {
        return $this->_encrypted;
    }

    /**
     * Encrypted data encoded in `base64`.
     */
    public function setEncrypted(string $encrypted): self
    {
        $this->_encrypted = $encrypted;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_encrypted !== null) $result['encrypted'] = $this->_encrypted;
        return !empty($result) ? $result : new stdClass();
    }
}
