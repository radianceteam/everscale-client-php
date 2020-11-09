<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;

class ParamsOfSubscribeCollection implements JsonSerializable
{
    /** Collection name (accounts, blocks, transactions, messages, block_signatures) */
    private string $_collection;

    /** Collection filter */
    private $_filter;

    /** Projection (result) string */
    private string $_result;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_collection = $dto['collection'];
        $this->_filter = $dto['filter'];
        $this->_result = $dto['result'];
    }

    /**
     * Collection name (accounts, blocks, transactions, messages, block_signatures)
     */
    public function getCollection(): string
    {
        return $this->_collection;
    }

    /**
     * Collection filter
     */
    public function getFilter()
    {
        return $this->_filter;
    }

    /**
     * Projection (result) string
     */
    public function getResult(): string
    {
        return $this->_result;
    }

    /**
     * Collection name (accounts, blocks, transactions, messages, block_signatures)
     */
    public function setCollection(string $collection): self
    {
        $this->_collection = $collection;
        return $this;
    }

    /**
     * Collection filter
     */
    public function setFilter($filter): self
    {
        $this->_filter = $filter;
        return $this;
    }

    /**
     * Projection (result) string
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
        return $result;
    }
}
