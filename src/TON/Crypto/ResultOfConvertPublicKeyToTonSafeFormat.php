<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfConvertPublicKeyToTonSafeFormat implements JsonSerializable
{
    private string $_tonPublicKey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_tonPublicKey = $dto['ton_public_key'] ?? '';
    }

    public function getTonPublicKey(): string
    {
        return $this->_tonPublicKey;
    }

    /**
     * @return self
     */
    public function setTonPublicKey(string $tonPublicKey): self
    {
        $this->_tonPublicKey = $tonPublicKey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_tonPublicKey !== null) $result['ton_public_key'] = $this->_tonPublicKey;
        return !empty($result) ? $result : new stdClass();
    }
}
