<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfWaitForCollection implements JsonSerializable
{
    private string $_collection;
    private $_filter;
    private string $_result;
    private ?int $_timeout;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_collection = $dto['collection'] ?? '';
        $this->_filter = $dto['filter'] ?? null;
        $this->_result = $dto['result'] ?? '';
        $this->_timeout = $dto['timeout'] ?? null;
    }

    public function getCollection(): string
    {
        return $this->_collection;
    }

    public function getFilter()
    {
        return $this->_filter;
    }

    public function getResult(): string
    {
        return $this->_result;
    }

    public function getTimeout(): ?int
    {
        return $this->_timeout;
    }

    public function setCollection(string $collection): self
    {
        $this->_collection = $collection;
        return $this;
    }

    public function setFilter($filter): self
    {
        $this->_filter = $filter;
        return $this;
    }

    public function setResult(string $result): self
    {
        $this->_result = $result;
        return $this;
    }

    public function setTimeout(?int $timeout): self
    {
        $this->_timeout = $timeout;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_collection !== null) $result['collection'] = $this->_collection;
        if ($this->_filter !== null) $result['filter'] = $this->_filter;
        if ($this->_result !== null) $result['result'] = $this->_result;
        if ($this->_timeout !== null) $result['timeout'] = $this->_timeout;
        return !empty($result) ? $result : new stdClass();
    }
}
