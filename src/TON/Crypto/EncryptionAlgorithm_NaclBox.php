<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class EncryptionAlgorithm_NaclBox extends EncryptionAlgorithm implements JsonSerializable
{
    private ?NaclBoxParamsEB $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = isset($dto['value']) ? new NaclBoxParamsEB($dto['value']) : null;
    }

    public function getValue(): ?NaclBoxParamsEB
    {
        return $this->_value;
    }

    /**
     * @return self
     */
    public function setValue(?NaclBoxParamsEB $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'NaclBox'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
