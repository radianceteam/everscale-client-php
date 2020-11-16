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
    /** Collection name (accounts, blocks, transactions, messages, block_signatures) */
    private string $_collection;

    /** Collection filter */
    private $_filter;

    /** Projection (result) string */
    private string $_result;

    /** Query timeout */
    private ?int $_timeout;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_collection = $dto['collection'] ?? '';
        $this->_filter = $dto['filter'] ?? null;
        $this->_result = $dto['result'] ?? '';
        $this->_timeout = $dto['timeout'] ?? null;
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
     * Query timeout
     */
    public function getTimeout(): ?int
    {
        return $this->_timeout;
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

    /**
     * Query timeout
     */
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
