<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfAggregateCollection implements JsonSerializable
{
    /**
     * Returns an array of strings. Each string refers to the corresponding `fields` item.
     * Numeric value is returned as a decimal string representations.
     */
    private $_values;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_values = $dto['values'] ?? null;
    }

    /**
     * Returns an array of strings. Each string refers to the corresponding `fields` item.
     * Numeric value is returned as a decimal string representations.
     */
    public function getValues()
    {
        return $this->_values;
    }

    /**
     * Returns an array of strings. Each string refers to the corresponding `fields` item.
     * Numeric value is returned as a decimal string representations.
     * @return self
     */
    public function setValues($values): self
    {
        $this->_values = $values;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_values !== null) $result['values'] = $this->_values;
        return !empty($result) ? $result : new stdClass();
    }
}
