<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class Keys extends Signer implements JsonSerializable
{
    private KeyPair $_keys;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_keys = new KeyPair($dto['keys'] ?? []);
    }

    public function getKeys(): KeyPair
    {
        return $this->_keys;
    }

    public function setKeys(KeyPair $keys): self
    {
        $this->_keys = $keys;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Keys'];
        if ($this->_keys !== null) $result['keys'] = $this->_keys;
        return $result;
    }
}
