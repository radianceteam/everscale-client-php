<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfMnemonicVerify implements JsonSerializable
{
    private bool $_valid;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_valid = $dto['valid'] ?? false;
    }

    public function isValid(): bool
    {
        return $this->_valid;
    }

    public function setValid(bool $valid): self
    {
        $this->_valid = $valid;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_valid !== null) $result['valid'] = $this->_valid;
        return !empty($result) ? $result : new stdClass();
    }
}
