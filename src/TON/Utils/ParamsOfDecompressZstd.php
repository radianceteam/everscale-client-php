<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;
use stdClass;

class ParamsOfDecompressZstd implements JsonSerializable
{
    /** Must be encoded as base64. */
    private string $_compressed;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_compressed = $dto['compressed'] ?? '';
    }

    /**
     * Must be encoded as base64.
     */
    public function getCompressed(): string
    {
        return $this->_compressed;
    }

    /**
     * Must be encoded as base64.
     * @return self
     */
    public function setCompressed(string $compressed): self
    {
        $this->_compressed = $compressed;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_compressed !== null) $result['compressed'] = $this->_compressed;
        return !empty($result) ? $result : new stdClass();
    }
}
