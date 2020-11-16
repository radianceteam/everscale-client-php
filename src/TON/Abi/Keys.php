<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use TON\Crypto\KeyPair;
use stdClass;

class Keys extends Signer implements JsonSerializable
{
    private ?KeyPair $_keys;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_keys = isset($dto['keys']) ? new KeyPair($dto['keys']) : null;
    }

    public function getKeys(): ?KeyPair
    {
        return $this->_keys;
    }

    public function setKeys(?KeyPair $keys): self
    {
        $this->_keys = $keys;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Keys'];
        if ($this->_keys !== null) $result['keys'] = $this->_keys;
        return !empty($result) ? $result : new stdClass();
    }
}
