<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfDecodeData implements JsonSerializable
{
    private $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_data = $dto['data'] ?? null;
    }

    public function getData()
    {
        return $this->_data;
    }

    /**
     * @return self
     */
    public function setData($data): self
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
