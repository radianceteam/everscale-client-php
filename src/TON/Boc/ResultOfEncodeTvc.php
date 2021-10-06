<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ResultOfEncodeTvc implements JsonSerializable
{
    private string $_tvc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_tvc = $dto['tvc'] ?? '';
    }

    public function getTvc(): string
    {
        return $this->_tvc;
    }

    /**
     * @return self
     */
    public function setTvc(string $tvc): self
    {
        $this->_tvc = $tvc;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_tvc !== null) $result['tvc'] = $this->_tvc;
        return !empty($result) ? $result : new stdClass();
    }
}
