<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ResultOfParse implements JsonSerializable
{
    private $_parsed;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_parsed = $dto['parsed'] ?? null;
    }

    public function getParsed()
    {
        return $this->_parsed;
    }

    public function setParsed($parsed): self
    {
        $this->_parsed = $parsed;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_parsed !== null) $result['parsed'] = $this->_parsed;
        return !empty($result) ? $result : new stdClass();
    }
}
