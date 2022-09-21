<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class BoxEncryptionAlgorithm_NaclSecretBox extends BoxEncryptionAlgorithm implements JsonSerializable
{
    private ?NaclSecretBoxParamsCB $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = isset($dto['value']) ? new NaclSecretBoxParamsCB($dto['value']) : null;
    }

    public function getValue(): ?NaclSecretBoxParamsCB
    {
        return $this->_value;
    }

    /**
     * @return self
     */
    public function setValue(?NaclSecretBoxParamsCB $value): self
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
