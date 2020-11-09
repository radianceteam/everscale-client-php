<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;

class ResultOfParse implements JsonSerializable
{
    /** JSON containing parsed BOC */
    private $_parsed;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_parsed = new ($dto['parsed']);
    }

    /**
     * JSON containing parsed BOC
     */
    public function getParsed()
    {
        return $this->_parsed;
    }

    /**
     * JSON containing parsed BOC
     */
    public function setParsed($parsed): self
    {
        $this->_parsed = $parsed;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_parsed !== null) $result['parsed'] = $this->_parsed;
        return $result;
    }
}
