<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfMnemonicVerify implements JsonSerializable
{
    /** Flag indicating if the mnemonic is valid or not */
    private bool $_valid;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_valid = $dto['valid'];
    }

    /**
     * Flag indicating if the mnemonic is valid or not
     */
    public function getValid(): bool
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
        return $result;
    }
}
