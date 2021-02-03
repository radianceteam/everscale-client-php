<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfMnemonicFromEntropy implements JsonSerializable
{
    /** Hex encoded. */
    private string $_entropy;
    private ?int $_dictionary;
    private ?int $_wordCount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_entropy = $dto['entropy'] ?? '';
        $this->_dictionary = $dto['dictionary'] ?? null;
        $this->_wordCount = $dto['word_count'] ?? null;
    }

    /**
     * Hex encoded.
     */
    public function getEntropy(): string
    {
        return $this->_entropy;
    }

    public function getDictionary(): ?int
    {
        return $this->_dictionary;
    }

    public function getWordCount(): ?int
    {
        return $this->_wordCount;
    }

    /**
     * Hex encoded.
     * @return self
     */
    public function setEntropy(string $entropy): self
    {
        $this->_entropy = $entropy;
        return $this;
    }

    /**
     * @return self
     */
    public function setDictionary(?int $dictionary): self
    {
        $this->_dictionary = $dictionary;
        return $this;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
