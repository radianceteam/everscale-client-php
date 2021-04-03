<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;
use stdClass;

class ParamsOfCompressZstd implements JsonSerializable
{
    /** Must be encoded as base64. */
    private string $_uncompressed;
    private ?int $_level;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_uncompressed = $dto['uncompressed'] ?? '';
        $this->_level = $dto['level'] ?? null;
    }

    /**
     * Must be encoded as base64.
     */
    public function getUncompressed(): string
    {
        return $this->_uncompressed;
    }

    public function getLevel(): ?int
    {
        return $this->_level;
    }

    /**
     * Must be encoded as base64.
     * @return self
     */
    public function setUncompressed(string $uncompressed): self
    {
        $this->_uncompressed = $uncompressed;
        return $this;
    }

    /**
     * @return self
     */
    public function setLevel(?int $level): self
    {
        $this->_level = $level;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_uncompressed !== null) $result['uncompressed'] = $this->_uncompressed;
        if ($this->_level !== null) $result['level'] = $this->_level;
        return !empty($result) ? $result : new stdClass();
    }
}
