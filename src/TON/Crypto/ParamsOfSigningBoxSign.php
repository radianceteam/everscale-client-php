<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfSigningBoxSign implements JsonSerializable
{
    private int $_signingBox;

    /** Must be encoded with `base64`. */
    private string $_unsigned;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signingBox = $dto['signing_box'] ?? 0;
        $this->_unsigned = $dto['unsigned'] ?? '';
    }

    public function getSigningBox(): int
    {
        return $this->_signingBox;
    }

    /**
     * Must be encoded with `base64`.
     */
    public function getUnsigned(): string
    {
        return $this->_unsigned;
    }

    public function setSigningBox(int $signingBox): self
    {
        $this->_signingBox = $signingBox;
        return $this;
    }

    /**
     * Must be encoded with `base64`.
     */
    public function setUnsigned(string $unsigned): self
    {
        $this->_unsigned = $unsigned;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_signingBox !== null) $result['signing_box'] = $this->_signingBox;
        if ($this->_unsigned !== null) $result['unsigned'] = $this->_unsigned;
        return !empty($result) ? $result : new stdClass();
    }
}
