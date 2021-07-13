<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfResumeBlockIterator implements JsonSerializable
{
    /** Same as value returned from `iterator_next`. */
    private $_resumeState;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_resumeState = $dto['resume_state'] ?? null;
    }

    /**
     * Same as value returned from `iterator_next`.
     */
    public function getResumeState()
    {
        return $this->_resumeState;
    }

    /**
     * Same as value returned from `iterator_next`.
     * @return self
     */
    public function setResumeState($resumeState): self
    {
        $this->_resumeState = $resumeState;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_resumeState !== null) $result['resume_state'] = $this->_resumeState;
        return !empty($result) ? $result : new stdClass();
    }
}
