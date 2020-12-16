<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfSigningBoxGetPublicKey implements JsonSerializable
{
    /** Public key of signing box. Encoded with hex */
    private string $_pubkey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_pubkey = $dto['pubkey'] ?? '';
    }

    /**
     * Public key of signing box. Encoded with hex
     */
    public function getPubkey(): string
    {
        return $this->_pubkey;
    }

    /**
     * Public key of signing box. Encoded with hex
     */
    public function setPubkey(string $pubkey): self
    {
        $this->_pubkey = $pubkey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_pubkey !== null) $result['pubkey'] = $this->_pubkey;
        return !empty($result) ? $result : new stdClass();
    }
}
