<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfGetEndpoints implements JsonSerializable
{
    private string $_query;
    private array $_endpoints;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_query = $dto['query'] ?? '';
        $this->_endpoints = $dto['endpoints'] ?? [];
    }

    public function getQuery(): string
    {
        return $this->_query;
    }

    public function getEndpoints(): array
    {
        return $this->_endpoints;
    }

    /**
     * @return self
     */
    public function setQuery(string $query): self
    {
        $this->_query = $query;
        return $this;
    }

    /**
     * @return self
     */
    public function setEndpoints(array $endpoints): self
    {
        $this->_endpoints = $endpoints;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_query !== null) $result['query'] = $this->_query;
        if ($this->_endpoints !== null) $result['endpoints'] = $this->_endpoints;
        return !empty($result) ? $result : new stdClass();
    }
}
