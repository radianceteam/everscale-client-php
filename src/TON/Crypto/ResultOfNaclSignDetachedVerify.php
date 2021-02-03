<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfNaclSignDetachedVerify implements JsonSerializable
{
    private bool $_succeeded;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_succeeded = $dto['succeeded'] ?? false;
    }

    public function isSucceeded(): bool
    {
        return $this->_succeeded;
    }

    /**
     * @return self
     */
    public function setSucceeded(bool $succeeded): self
    {
        $this->_succeeded = $succeeded;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_succeeded !== null) $result['succeeded'] = $this->_succeeded;
        return !empty($result) ? $result : new stdClass();
    }
}
