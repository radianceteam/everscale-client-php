<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ResultOfGetBocHash implements JsonSerializable
{
    /** BOC root hash encoded with hex */
    private string $_hash;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_hash = $dto['hash'] ?? '';
    }

    /**
     * BOC root hash encoded with hex
     */
    public function getHash(): string
    {
        return $this->_hash;
    }

    /**
     * BOC root hash encoded with hex
     */
    public function setHash(string $hash): self
    {
        $this->_hash = $hash;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_hash !== null) $result['hash'] = $this->_hash;
        return !empty($result) ? $result : new stdClass();
    }
}
