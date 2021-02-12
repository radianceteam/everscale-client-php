<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfBocCacheGet implements JsonSerializable
{
    private string $_bocRef;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_bocRef = $dto['boc_ref'] ?? '';
    }

    public function getBocRef(): string
    {
        return $this->_bocRef;
    }

    /**
     * @return self
     */
    public function setBocRef(string $bocRef): self
    {
        $this->_bocRef = $bocRef;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_bocRef !== null) $result['boc_ref'] = $this->_bocRef;
        return !empty($result) ? $result : new stdClass();
    }
}
