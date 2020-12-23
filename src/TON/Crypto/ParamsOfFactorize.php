<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfFactorize implements JsonSerializable
{
    private string $_composite;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_composite = $dto['composite'] ?? '';
    }

    public function getComposite(): string
    {
        return $this->_composite;
    }

    public function setComposite(string $composite): self
    {
        $this->_composite = $composite;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_composite !== null) $result['composite'] = $this->_composite;
        return !empty($result) ? $result : new stdClass();
    }
}
