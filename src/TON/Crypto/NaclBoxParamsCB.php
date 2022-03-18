<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class NaclBoxParamsCB implements JsonSerializable
{
    /** Must be encoded with `hex`. */
    private string $_theirPublic;

    /** Must be encoded with `hex`. */
    private string $_nonce;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_theirPublic = $dto['their_public'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
    }

    /**
     * Must be encoded with `hex`.
     */
    public function getTheirPublic(): string
    {
        return $this->_theirPublic;
    }

    /**
     * Must be encoded with `hex`.
     */
    public function getNonce(): string
    {
        return $this->_nonce;
    }

    /**
     * Must be encoded with `hex`.
     * @return self
     */
    public function setTheirPublic(string $theirPublic): self
    {
        $this->_theirPublic = $theirPublic;
        return $this;
    }

    /**
     * Must be encoded with `hex`.
     * @return self
     */
    public function setNonce(string $nonce): self
    {
        $this->_nonce = $nonce;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_theirPublic !== null) $result['their_public'] = $this->_theirPublic;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        return !empty($result) ? $result : new stdClass();
    }
}
