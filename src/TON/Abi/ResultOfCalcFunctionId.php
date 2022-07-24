<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfCalcFunctionId implements JsonSerializable
{
    private int $_functionId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_functionId = $dto['function_id'] ?? 0;
    }

    public function getFunctionId(): int
    {
        return $this->_functionId;
    }

    /**
     * @return self
     */
    public function setFunctionId(int $functionId): self
    {
        $this->_functionId = $functionId;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_functionId !== null) $result['function_id'] = $this->_functionId;
        return !empty($result) ? $result : new stdClass();
    }
}
