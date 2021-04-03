<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;
use stdClass;

class ResultOfDecompressZstd implements JsonSerializable
{
    /** Must be encoded as base64. */
    private string $_decompressed;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_decompressed = $dto['decompressed'] ?? '';
    }

    /**
     * Must be encoded as base64.
     */
    public function getDecompressed(): string
    {
        return $this->_decompressed;
    }

    /**
     * Must be encoded as base64.
     * @return self
     */
    public function setDecompressed(string $decompressed): self
    {
        $this->_decompressed = $decompressed;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_decompressed !== null) $result['decompressed'] = $this->_decompressed;
        return !empty($result) ? $result : new stdClass();
    }
}
