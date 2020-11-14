<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;

class ResultOfWaitForCollection implements JsonSerializable
{
    /** First found object that matches the provided criteria */
    private $_result;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_result = $dto['result'] ?? null;
    }

    /**
     * First found object that matches the provided criteria
     */
    public function getResult()
    {
        return $this->_result;
    }

    /**
     * First found object that matches the provided criteria
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
        return $result;
    }
}
