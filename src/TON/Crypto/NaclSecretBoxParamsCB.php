<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class NaclSecretBoxParamsCB implements JsonSerializable
{
    private string $_nonce;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_nonce = $dto['nonce'] ?? '';
    }

    public function getNonce(): string
    {
        return $this->_nonce;
    }

    /**
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
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        return !empty($result) ? $result : new stdClass();
    }
}
