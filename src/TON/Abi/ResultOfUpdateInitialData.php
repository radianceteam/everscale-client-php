<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfUpdateInitialData implements JsonSerializable
{
    private string $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_data = $dto['data'] ?? '';
    }

    public function getData(): string
    {
        return $this->_data;
    }

    /**
     * @return self
     */
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_data !== null) $result['data'] = $this->_data;
        return !empty($result) ? $result : new stdClass();
    }
}
