<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class CryptoBoxSecret_RandomSeedPhrase extends CryptoBoxSecret implements JsonSerializable
{
    private int $_dictionary;
    private int $_wordcount;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_dictionary = $dto['dictionary'] ?? 0;
        $this->_wordcount = $dto['wordcount'] ?? 0;
    }

    public function getDictionary(): int
    {
        return $this->_dictionary;
    }

    public function getWordcount(): int
    {
        return $this->_wordcount;
    }

    /**
     * @return self
     */
    public function setDictionary(int $dictionary): self
    {
        $this->_dictionary = $dictionary;
        return $this;
    }

    /**
     * @return self
     */
    public function setWordcount(int $wordcount): self
    {
        $this->_wordcount = $wordcount;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'RandomSeedPhrase'];
        if ($this->_dictionary !== null) $result['dictionary'] = $this->_dictionary;
        if ($this->_wordcount !== null) $result['wordcount'] = $this->_wordcount;
        return !empty($result) ? $result : new stdClass();
    }
}
