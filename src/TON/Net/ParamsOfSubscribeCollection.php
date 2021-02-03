<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfSubscribeCollection implements JsonSerializable
{
    private string $_collection;
    private $_filter;
    private string $_result;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_collection = $dto['collection'] ?? '';
        $this->_filter = $dto['filter'] ?? null;
        $this->_result = $dto['result'] ?? '';
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

    /**
     * @return self
     */
    public function setCollection(string $collection): self
    {
        $this->_collection = $collection;
        return $this;
    }

    /**
     * @return self
     */
    public function setFilter($filter): self
    {
        $this->_filter = $filter;
        return $this;
    }

    /**
     * @return self
     */
    public function setResult(string $result): self
    {
        $this->_result = $result;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_collection !== null) $result['collection'] = $this->_collection;
        if ($this->_filter !== null) $result['filter'] = $this->_filter;
        if ($this->_result !== null) $result['result'] = $this->_result;
        return !empty($result) ? $result : new stdClass();
    }
}
