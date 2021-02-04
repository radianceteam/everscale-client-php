<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfQueryOperation_AggregateCollection extends ParamsOfQueryOperation implements JsonSerializable
{
    private string $_collection;
    private $_filter;

    /** @var FieldAggregation[]|null */
    private ?array $_fields;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_collection = $dto['collection'] ?? '';
        $this->_filter = $dto['filter'] ?? null;
        $this->_fields = $dto['fields'] ?? null;
    }

    public function getCollection(): string
    {
        return $this->_collection;
    }

    public function getFilter()
    {
        return $this->_filter;
    }

    /**
     * @return FieldAggregation[]|null
     */
    public function getFields(): ?array
    {
        return $this->_fields;
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
     * @param FieldAggregation[]|null $fields
     * @return self
     */
    public function setFields(?array $fields): self
    {
        $this->_fields = $fields;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'AggregateCollection'];
        if ($this->_collection !== null) $result['collection'] = $this->_collection;
        if ($this->_filter !== null) $result['filter'] = $this->_filter;
        if ($this->_fields !== null) $result['fields'] = $this->_fields;
        return !empty($result) ? $result : new stdClass();
    }
}
