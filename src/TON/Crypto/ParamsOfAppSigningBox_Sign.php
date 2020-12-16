<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfAppSigningBox_Sign extends ParamsOfAppSigningBox implements JsonSerializable
{
    /** Data to sign encoded as base64 */
    private string $_unsigned;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_unsigned = $dto['unsigned'] ?? '';
    }

    /**
     * Data to sign encoded as base64
     */
    public function getUnsigned(): string
    {
        return $this->_unsigned;
    }

    /**
     * Data to sign encoded as base64
     */
    public function setUnsigned(string $unsigned): self
    {
        $this->_unsigned = $unsigned;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Sign'];
        if ($this->_unsigned !== null) $result['unsigned'] = $this->_unsigned;
        return !empty($result) ? $result : new stdClass();
    }
}
