<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class FieldAggregation implements JsonSerializable
{
    private string $_field;
    private string $_fn;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_field = $dto['field'] ?? '';
        $this->_fn = $dto['fn'] ?? '';
    }

    public function getField(): string
    {
        return $this->_field;
    }

    public function getFn(): string
    {
        return $this->_fn;
    }

    /**
     * @return self
     */
    public function setField(string $field): self
    {
        $this->_field = $field;
        return $this;
    }

    /**
     * @return self
     */
    public function setFn(string $fn): self
    {
        $this->_fn = $fn;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_field !== null) $result['field'] = $this->_field;
        if ($this->_fn !== null) $result['fn'] = $this->_fn;
        return !empty($result) ? $result : new stdClass();
    }
}
