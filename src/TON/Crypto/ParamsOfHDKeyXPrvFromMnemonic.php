<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfHDKeyXPrvFromMnemonic implements JsonSerializable
{
    /** String with seed phrase */
    private string $_phrase;

    /** Dictionary identifier */
    private int $_dictionary;

    /** Mnemonic word count */
    private int $_wordCount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_phrase = $dto['phrase'];
        $this->_dictionary = $dto['dictionary'];
        $this->_wordCount = $dto['word_count'];
    }

    /**
     * String with seed phrase
     */
    public function getPhrase(): string
    {
        return $this->_phrase;
    }

    /**
     * Dictionary identifier
     */
    public function getDictionary(): ?int
    {
        return $this->_dictionary;
    }

    /**
     * Mnemonic word count
     */
    public function getWordCount(): ?int
    {
        return $this->_wordCount;
    }

    /**
     * String with seed phrase
     */
    public function setPhrase(string $phrase): self
    {
        $this->_phrase = $phrase;
        return $this;
    }

    /**
     * Dictionary identifier
     */
    public function setDictionary(?int $dictionary): self
    {
        $this->_dictionary = $dictionary;
        return $this;
    }

    /**
     * Mnemonic word count
     */
    public function setWordCount(?int $wordCount): self
    {
        $this->_wordCount = $wordCount;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_phrase !== null) $result['phrase'] = $this->_phrase;
        if ($this->_dictionary !== null) $result['dictionary'] = $this->_dictionary;
        if ($this->_wordCount !== null) $result['word_count'] = $this->_wordCount;
        return $result;
    }
}
