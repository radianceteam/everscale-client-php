<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfCreateEncryptionBox implements JsonSerializable
{
    private ?EncryptionAlgorithm $_algorithm;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_algorithm = isset($dto['algorithm']) ? EncryptionAlgorithm::create($dto['algorithm']) : null;
    }

    public function getAlgorithm(): ?EncryptionAlgorithm
    {
        return $this->_algorithm;
    }

    /**
     * @return self
     */
    public function setAlgorithm(?EncryptionAlgorithm $algorithm): self
    {
        $this->_algorithm = $algorithm;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_algorithm !== null) $result['algorithm'] = $this->_algorithm;
        return !empty($result) ? $result : new stdClass();
    }
}
