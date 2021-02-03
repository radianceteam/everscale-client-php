<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class EndpointsSet implements JsonSerializable
{
    private array $_endpoints;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_endpoints = $dto['endpoints'] ?? [];
    }

    public function getEndpoints(): array
    {
        return $this->_endpoints;
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
        if ($this->_endpoints !== null) $result['endpoints'] = $this->_endpoints;
        return !empty($result) ? $result : new stdClass();
    }
}
