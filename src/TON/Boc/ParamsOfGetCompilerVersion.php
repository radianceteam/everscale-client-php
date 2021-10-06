<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfGetCompilerVersion implements JsonSerializable
{
    private string $_code;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_code = $dto['code'] ?? '';
    }

    public function getCode(): string
    {
        return $this->_code;
    }

    /**
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->_code = $code;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_code !== null) $result['code'] = $this->_code;
        return !empty($result) ? $result : new stdClass();
    }
}
