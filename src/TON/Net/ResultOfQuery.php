<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfQuery implements JsonSerializable
{
    private $_result;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_result = $dto['result'] ?? null;
    }

    public function getResult()
    {
        return $this->_result;
    }

    /**
     * @return self
     */
    public function setResult($result): self
    {
        $this->_result = $result;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_result !== null) $result['result'] = $this->_result;
        return !empty($result) ? $result : new stdClass();
    }
}
