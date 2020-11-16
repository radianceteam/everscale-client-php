<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use stdClass;

class ResultOfRunGet implements JsonSerializable
{
    /** Values returned by getmethod on stack */
    private $_output;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_output = $dto['output'] ?? null;
    }

    /**
     * Values returned by getmethod on stack
     */
    public function getOutput()
    {
        return $this->_output;
    }

    /**
     * Values returned by getmethod on stack
     */
    public function setOutput($output): self
    {
        $this->_output = $output;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_output !== null) $result['output'] = $this->_output;
        return !empty($result) ? $result : new stdClass();
    }
}
