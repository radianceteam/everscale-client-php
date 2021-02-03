<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfNaclBoxOpen implements JsonSerializable
{
    private string $_decrypted;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_decrypted = $dto['decrypted'] ?? '';
    }

    public function getDecrypted(): string
    {
        return $this->_decrypted;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
