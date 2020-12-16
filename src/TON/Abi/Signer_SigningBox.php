<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class Signer_SigningBox extends Signer implements JsonSerializable
{
    private int $_handle;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_handle = $dto['handle'] ?? 0;
    }

    public function getHandle(): int
    {
        return $this->_handle;
    }

    public function setHandle(int $handle): self
    {
        $this->_handle = $handle;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'SigningBox'];
        if ($this->_handle !== null) $result['handle'] = $this->_handle;
        return !empty($result) ? $result : new stdClass();
    }
}
