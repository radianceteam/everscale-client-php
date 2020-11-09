<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfMnemonicWords implements JsonSerializable
{
    /** The list of mnemonic words */
    private string $_words;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_words = $dto['words'];
    }

    /**
     * The list of mnemonic words
     */
    public function getWords(): string
    {
        return $this->_words;
    }

    /**
     * The list of mnemonic words
     */
    public function setWords(string $words): self
    {
        $this->_words = $words;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_words !== null) $result['words'] = $this->_words;
        return $result;
    }
}
