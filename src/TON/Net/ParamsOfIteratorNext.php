<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfIteratorNext implements JsonSerializable
{
    private int $_iterator;

    /** If value is missing or is less than 1 the library uses 1. */
    private ?int $_limit;
    private ?bool $_returnResumeState;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_iterator = $dto['iterator'] ?? 0;
        $this->_limit = $dto['limit'] ?? null;
        $this->_returnResumeState = $dto['return_resume_state'] ?? null;
    }

    public function getIterator(): int
    {
        return $this->_iterator;
    }

    /**
     * If value is missing or is less than 1 the library uses 1.
     */
    public function getLimit(): ?int
    {
        return $this->_limit;
    }

    public function isReturnResumeState(): ?bool
    {
        return $this->_returnResumeState;
    }

    /**
     * @return self
     */
    public function setIterator(int $iterator): self
    {
        $this->_iterator = $iterator;
        return $this;
    }

    /**
     * If value is missing or is less than 1 the library uses 1.
     * @return self
     */
    public function setLimit(?int $limit): self
    {
        $this->_limit = $limit;
        return $this;
    }

    /**
     * @return self
     */
    public function setReturnResumeState(?bool $returnResumeState): self
    {
        $this->_returnResumeState = $returnResumeState;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_iterator !== null) $result['iterator'] = $this->_iterator;
        if ($this->_limit !== null) $result['limit'] = $this->_limit;
        if ($this->_returnResumeState !== null) $result['return_resume_state'] = $this->_returnResumeState;
        return !empty($result) ? $result : new stdClass();
    }
}
