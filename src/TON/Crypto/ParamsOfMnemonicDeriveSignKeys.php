<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfMnemonicDeriveSignKeys implements JsonSerializable
{
    /** Phrase */
    private string $_phrase;

    /** Derivation path, for instance "m/44'/396'/0'/0/0" */
    private string $_path;

    /** Dictionary identifier */
    private int $_dictionary;

    /** Word count */
    private int $_wordCount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_phrase = $dto['phrase'];
        $this->_path = $dto['path'];
        $this->_dictionary = $dto['dictionary'];
        $this->_wordCount = $dto['word_count'];
    }

    /**
     * Phrase
     */
    public function getPhrase(): string
    {
        return $this->_phrase;
    }

    /**
     * Derivation path, for instance "m/44'/396'/0'/0/0"
     */
    public function getPath(): ?string
    {
        return $this->_path;
    }

    /**
     * Dictionary identifier
     */
    public function getDictionary(): ?int
    {
        return $this->_dictionary;
    }

    /**
     * Word count
     */
    public function getWordCount(): ?int
    {
        return $this->_wordCount;
    }

    /**
     * Phrase
     */
    public function setPhrase(string $phrase): self
    {
        $this->_phrase = $phrase;
        return $this;
    }

    /**
     * Derivation path, for instance "m/44'/396'/0'/0/0"
     */
    public function setPath(?string $path): self
    {
        $this->_path = $path;
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
     * Word count
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
        if ($this->_path !== null) $result['path'] = $this->_path;
        if ($this->_dictionary !== null) $result['dictionary'] = $this->_dictionary;
        if ($this->_wordCount !== null) $result['word_count'] = $this->_wordCount;
        return $result;
    }
}