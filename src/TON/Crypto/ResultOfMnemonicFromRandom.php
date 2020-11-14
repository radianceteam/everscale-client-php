<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ResultOfMnemonicFromRandom implements JsonSerializable
{
    /** String of mnemonic words */
    private string $_phrase;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_phrase = $dto['phrase'] ?? '';
    }

    /**
     * String of mnemonic words
     */
    public function getPhrase(): string
    {
        return $this->_phrase;
    }

    /**
     * String of mnemonic words
     */
    public function setPhrase(string $phrase): self
    {
        $this->_phrase = $phrase;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_phrase !== null) $result['phrase'] = $this->_phrase;
        return $result;
    }
}
