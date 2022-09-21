<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class EncryptionAlgorithm_AES extends EncryptionAlgorithm implements JsonSerializable
{
    private ?AesParamsEB $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = isset($dto['value']) ? new AesParamsEB($dto['value']) : null;
    }

    public function getValue(): ?AesParamsEB
    {
        return $this->_value;
    }

    /**
     * @return self
     */
    public function setValue(?AesParamsEB $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'AES'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
