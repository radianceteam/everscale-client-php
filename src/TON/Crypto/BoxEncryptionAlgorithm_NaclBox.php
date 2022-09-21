<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class BoxEncryptionAlgorithm_NaclBox extends BoxEncryptionAlgorithm implements JsonSerializable
{
    private ?NaclBoxParamsCB $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = isset($dto['value']) ? new NaclBoxParamsCB($dto['value']) : null;
    }

    public function getValue(): ?NaclBoxParamsCB
    {
        return $this->_value;
    }

    /**
     * @return self
     */
    public function setValue(?NaclBoxParamsCB $value): self
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
