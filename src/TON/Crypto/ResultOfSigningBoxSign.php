<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfSigningBoxSign implements JsonSerializable
{
    /** Encoded with `hex`. */
    private string $_signature;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signature = $dto['signature'] ?? '';
    }

    /**
     * Encoded with `hex`.
     */
    public function getSignature(): string
    {
        return $this->_signature;
    }

    /**
     * Encoded with `hex`.
     * @return self
     */
    public function setSignature(string $signature): self
    {
        $this->_signature = $signature;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_signature !== null) $result['signature'] = $this->_signature;
        return !empty($result) ? $result : new stdClass();
    }
}
