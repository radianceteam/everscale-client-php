<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class RegisteredSigningBox implements JsonSerializable
{
    /** Handle of the signing box. */
    private int $_handle;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_handle = $dto['handle'] ?? 0;
    }

    /**
     * Handle of the signing box.
     */
    public function getHandle(): int
    {
        return $this->_handle;
    }

    /**
     * Handle of the signing box.
     */
    public function setHandle(int $handle): self
    {
        $this->_handle = $handle;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_handle !== null) $result['handle'] = $this->_handle;
        return !empty($result) ? $result : new stdClass();
    }
}
