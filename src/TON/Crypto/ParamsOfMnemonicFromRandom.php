<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfMnemonicFromRandom implements JsonSerializable
{
    private ?int $_dictionary;
    private ?int $_wordCount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_dictionary = $dto['dictionary'] ?? null;
        $this->_wordCount = $dto['word_count'] ?? null;
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
        if ($this->_dictionary !== null) $result['dictionary'] = $this->_dictionary;
        if ($this->_wordCount !== null) $result['word_count'] = $this->_wordCount;
        return !empty($result) ? $result : new stdClass();
    }
}
