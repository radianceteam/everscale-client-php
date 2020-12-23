<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfParse implements JsonSerializable
{
    private string $_boc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_boc = $dto['boc'] ?? '';
    }

    public function getBoc(): string
    {
        return $this->_boc;
    }

    public function setBoc(string $boc): self
    {
        $this->_boc = $boc;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_boc !== null) $result['boc'] = $this->_boc;
        return !empty($result) ? $result : new stdClass();
    }
}
