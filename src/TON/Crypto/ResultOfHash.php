<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfHash implements JsonSerializable
{
    /** Hash of input `data`. Encoded with 'hex'. */
    private string $_hash;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_hash = $dto['hash'] ?? '';
    }

    /**
     * Hash of input `data`. Encoded with 'hex'.
     */
    public function getHash(): string
    {
        return $this->_hash;
    }

    /**
     * Hash of input `data`. Encoded with 'hex'.
     */
    public function setHash(string $hash): self
    {
        $this->_hash = $hash;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_hash !== null) $result['hash'] = $this->_hash;
        return $result;
    }
}
