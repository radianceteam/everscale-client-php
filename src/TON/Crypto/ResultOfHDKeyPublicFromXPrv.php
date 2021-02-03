<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfHDKeyPublicFromXPrv implements JsonSerializable
{
    private string $_public;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_public = $dto['public'] ?? '';
    }

    public function getPublic(): string
    {
        return $this->_public;
    }

    /**
     * @return self
     */
    public function setPublic(string $public): self
    {
        $this->_public = $public;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_public !== null) $result['public'] = $this->_public;
        return !empty($result) ? $result : new stdClass();
    }
}
