<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfQuery implements JsonSerializable
{
    private string $_query;

    /** Must be a map with named values thatcan be used in query. */
    private $_variables;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_query = $dto['query'] ?? '';
        $this->_variables = $dto['variables'] ?? null;
    }

    public function getQuery(): string
    {
        return $this->_query;
    }

    /**
     * Must be a map with named values thatcan be used in query.
     */
    public function getVariables()
    {
        return $this->_variables;
    }

    public function setQuery(string $query): self
    {
        $this->_query = $query;
        return $this;
    }

    /**
     * Must be a map with named values thatcan be used in query.
     */
    public function setVariables($variables): self
    {
        $this->_variables = $variables;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_query !== null) $result['query'] = $this->_query;
        if ($this->_variables !== null) $result['variables'] = $this->_variables;
        return !empty($result) ? $result : new stdClass();
    }
}
