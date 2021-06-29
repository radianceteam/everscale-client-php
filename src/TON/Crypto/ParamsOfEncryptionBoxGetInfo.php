<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfEncryptionBoxGetInfo implements JsonSerializable
{
    private int $_encryptionBox;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encryptionBox = $dto['encryption_box'] ?? 0;
    }

    public function getEncryptionBox(): int
    {
        return $this->_encryptionBox;
    }

    /**
     * @return self
     */
    public function setEncryptionBox(int $encryptionBox): self
    {
        $this->_encryptionBox = $encryptionBox;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_encryptionBox !== null) $result['encryption_box'] = $this->_encryptionBox;
        return !empty($result) ? $result : new stdClass();
    }
}
