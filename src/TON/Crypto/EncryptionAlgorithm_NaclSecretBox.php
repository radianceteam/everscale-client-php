<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class EncryptionAlgorithm_NaclSecretBox extends EncryptionAlgorithm implements JsonSerializable
{
    private ?NaclSecretBoxParamsEB $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = isset($dto['value']) ? new NaclSecretBoxParamsEB($dto['value']) : null;
    }

    public function getValue(): ?NaclSecretBoxParamsEB
    {
        return $this->_value;
    }

    /**
     * @return self
     */
    public function setValue(?NaclSecretBoxParamsEB $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'NaclSecretBox'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
