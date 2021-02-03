<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfBatchQuery implements JsonSerializable
{
    /** Returns an array of values. Each value corresponds to `queries` item. */
    private array $_results;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_results = $dto['results'] ?? [];
    }

    /**
     * Returns an array of values. Each value corresponds to `queries` item.
     */
    public function getResults(): array
    {
        return $this->_results;
    }

    /**
     * Returns an array of values. Each value corresponds to `queries` item.
     * @return self
     */
    public function setResults(array $results): self
    {
        $this->_results = $results;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_results !== null) $result['results'] = $this->_results;
        return !empty($result) ? $result : new stdClass();
    }
}
