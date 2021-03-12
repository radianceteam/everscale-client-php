<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class BuilderOp_BitString extends BuilderOp implements JsonSerializable
{
    /**
     * Contains hexadecimal string representation:
     * - Can end with `_` tag.
     * - Can be prefixed with `x` or `X`.
     * - Can be prefixed with `x{` or `X{` and ended with `}`.
     *
     * Contains binary string represented as a sequence
     * of `0` and `1` prefixed with `n` or `N`.
     *
     * Examples:
     * `1AB`, `x1ab`, `X1AB`, `x{1abc}`, `X{1ABC}`
     * `2D9_`, `x2D9_`, `X2D9_`, `x{2D9_}`, `X{2D9_}`
     * `n00101101100`, `N00101101100`
     */
    private string $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = $dto['value'] ?? '';
    }

    /**
     * Contains hexadecimal string representation:
     * - Can end with `_` tag.
     * - Can be prefixed with `x` or `X`.
     * - Can be prefixed with `x{` or `X{` and ended with `}`.
     *
     * Contains binary string represented as a sequence
     * of `0` and `1` prefixed with `n` or `N`.
     *
     * Examples:
     * `1AB`, `x1ab`, `X1AB`, `x{1abc}`, `X{1ABC}`
     * `2D9_`, `x2D9_`, `X2D9_`, `x{2D9_}`, `X{2D9_}`
     * `n00101101100`, `N00101101100`
     */
    public function getValue(): string
    {
        return $this->_value;
    }

    /**
     * Contains hexadecimal string representation:
     * - Can end with `_` tag.
     * - Can be prefixed with `x` or `X`.
     * - Can be prefixed with `x{` or `X{` and ended with `}`.
     *
     * Contains binary string represented as a sequence
     * of `0` and `1` prefixed with `n` or `N`.
     *
     * Examples:
     * `1AB`, `x1ab`, `X1AB`, `x{1abc}`, `X{1ABC}`
     * `2D9_`, `x2D9_`, `X2D9_`, `x{2D9_}`, `X{2D9_}`
     * `n00101101100`, `N00101101100`
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'BitString'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
