<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfMnemonicFromEntropy implements JsonSerializable
{
    /** Entropy bytes. Hex encoded. */
    private string $_entropy;

    /** Dictionary identifier */
    private int $_dictionary;

    /** Mnemonic word count */
    private int $_wordCount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_entropy = $dto['entropy'];
        $this->_dictionary = $dto['dictionary'];
        $this->_wordCount = $dto['word_count'];
    }

    /**
     * Entropy bytes. Hex encoded.
     */
    public function getEntropy(): string
    {
        return $this->_entropy;
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
     * Entropy bytes. Hex encoded.
     */
    public function setEntropy(string $entropy): self
    {
        $this->_entropy = $entropy;
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
        if ($this->_entropy !== null) $result['entropy'] = $this->_entropy;
        if ($this->_dictionary !== null) $result['dictionary'] = $this->_dictionary;
        if ($this->_wordCount !== null) $result['word_count'] = $this->_wordCount;
        return $result;
    }
}
