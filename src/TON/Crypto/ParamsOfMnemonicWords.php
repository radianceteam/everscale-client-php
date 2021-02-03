<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfMnemonicWords implements JsonSerializable
{
    private ?int $_dictionary;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_dictionary = $dto['dictionary'] ?? null;
    }

    public function getDictionary(): ?int
    {
        return $this->_dictionary;
    }

    /**
     * @return self
     */
    public function setDictionary(?int $dictionary): self
    {
        $this->_dictionary = $dictionary;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_dictionary !== null) $result['dictionary'] = $this->_dictionary;
        return !empty($result) ? $result : new stdClass();
    }
}
