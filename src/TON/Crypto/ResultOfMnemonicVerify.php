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
    /** Flag indicating if the mnemonic is valid or not */
    private bool $_valid;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_valid = $dto['valid'] ?? false;
    }

    /**
     * Flag indicating if the mnemonic is valid or not
     */
    public function isValid(): bool
    {
        return $this->_valid;
    }

    /**
     * Flag indicating if the mnemonic is valid or not
     */
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
