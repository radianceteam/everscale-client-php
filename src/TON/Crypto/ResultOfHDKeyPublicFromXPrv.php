<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfHDKeyPublicFromXPrv implements JsonSerializable
{
    /** Public key - 64 symbols hex string */
    private string $_public;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_public = $dto['public'];
    }

    /**
     * Public key - 64 symbols hex string
     */
    public function getPublic(): string
    {
        return $this->_public;
    }

    /**
     * Public key - 64 symbols hex string
     */
    public function setPublic(string $public): self
    {
        $this->_public = $public;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_public !== null) $result['public'] = $this->_public;
        return $result;
    }
}
