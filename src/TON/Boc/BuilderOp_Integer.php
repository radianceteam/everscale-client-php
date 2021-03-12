<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class BuilderOp_Integer extends BuilderOp implements JsonSerializable
{
    private int $_size;

    /**
     * e.g. `123`, `-123`. - Decimal string. e.g. `"123"`, `"-123"`.
     * - `0x` prefixed hexadecimal string.
     *   e.g `0x123`, `0X123`, `-0x123`.
     */
    private $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_size = $dto['size'] ?? 0;
        $this->_value = $dto['value'] ?? null;
    }

    public function getSize(): int
    {
        return $this->_size;
    }

    /**
     * e.g. `123`, `-123`. - Decimal string. e.g. `"123"`, `"-123"`.
     * - `0x` prefixed hexadecimal string.
     *   e.g `0x123`, `0X123`, `-0x123`.
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @return self
     */
    public function setSize(int $size): self
    {
        $this->_size = $size;
        return $this;
    }

    /**
     * e.g. `123`, `-123`. - Decimal string. e.g. `"123"`, `"-123"`.
     * - `0x` prefixed hexadecimal string.
     *   e.g `0x123`, `0X123`, `-0x123`.
     * @return self
     */
    public function setValue($value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Integer'];
        if ($this->_size !== null) $result['size'] = $this->_size;
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
