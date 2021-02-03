<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfNaclSignDetachedVerify implements JsonSerializable
{
    /** Encoded with `base64`. */
    private string $_unsigned;

    /** Encoded with `hex`. */
    private string $_signature;
    private string $_public;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_unsigned = $dto['unsigned'] ?? '';
        $this->_signature = $dto['signature'] ?? '';
        $this->_public = $dto['public'] ?? '';
    }

    /**
     * Encoded with `base64`.
     */
    public function getUnsigned(): string
    {
        return $this->_unsigned;
    }

    /**
     * Encoded with `hex`.
     */
    public function getSignature(): string
    {
        return $this->_signature;
    }

    public function getPublic(): string
    {
        return $this->_public;
    }

    /**
     * Encoded with `base64`.
     * @return self
     */
    public function setUnsigned(string $unsigned): self
    {
        $this->_unsigned = $unsigned;
        return $this;
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

    /**
     * @return self
     */
    public function setPublic(string $public): self
    {
        $this->_public = $public;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_unsigned !== null) $result['unsigned'] = $this->_unsigned;
        if ($this->_signature !== null) $result['signature'] = $this->_signature;
        if ($this->_public !== null) $result['public'] = $this->_public;
        return !empty($result) ? $result : new stdClass();
    }
}
