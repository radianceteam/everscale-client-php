<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class EncryptionAlgorithm_ChaCha20 extends EncryptionAlgorithm implements JsonSerializable
{
    private ?ChaCha20ParamsEB $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = isset($dto['value']) ? new ChaCha20ParamsEB($dto['value']) : null;
    }

    public function getValue(): ?ChaCha20ParamsEB
    {
        return $this->_value;
    }

    /**
     * @return self
     */
    public function setValue(?ChaCha20ParamsEB $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'ChaCha20'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
