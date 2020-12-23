<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfMnemonicDeriveSignKeys implements JsonSerializable
{
    private string $_phrase;
    private ?string $_path;
    private ?int $_dictionary;
    private ?int $_wordCount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_phrase = $dto['phrase'] ?? '';
        $this->_path = $dto['path'] ?? null;
        $this->_dictionary = $dto['dictionary'] ?? null;
        $this->_wordCount = $dto['word_count'] ?? null;
    }

    public function getPhrase(): string
    {
        return $this->_phrase;
    }

    public function getPath(): ?string
    {
        return $this->_path;
    }

    public function getDictionary(): ?int
    {
        return $this->_dictionary;
    }

    public function getWordCount(): ?int
    {
        return $this->_wordCount;
    }

    public function setPhrase(string $phrase): self
    {
        $this->_phrase = $phrase;
        return $this;
    }

    public function setPath(?string $path): self
    {
        $this->_path = $path;
        return $this;
    }

    public function setDictionary(?int $dictionary): self
    {
        $this->_dictionary = $dictionary;
        return $this;
    }

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
        return !empty($result) ? $result : new stdClass();
    }
}
