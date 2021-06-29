<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfEncryptionBoxEncrypt implements JsonSerializable
{
    private int $_encryptionBox;
    private string $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encryptionBox = $dto['encryption_box'] ?? 0;
        $this->_data = $dto['data'] ?? '';
    }

    public function getEncryptionBox(): int
    {
        return $this->_encryptionBox;
    }

    public function getData(): string
    {
        return $this->_data;
    }

    /**
     * @return self
     */
    public function setEncryptionBox(int $encryptionBox): self
    {
        $this->_encryptionBox = $encryptionBox;
        return $this;
    }

    /**
     * @return self
     */
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_encryptionBox !== null) $result['encryption_box'] = $this->_encryptionBox;
        if ($this->_data !== null) $result['data'] = $this->_data;
        return !empty($result) ? $result : new stdClass();
    }
}
