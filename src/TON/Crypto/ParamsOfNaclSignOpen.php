<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfNaclSignOpen implements JsonSerializable
{
    /** Encoded with `base64`. */
    private string $_signed;
    private string $_public;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signed = $dto['signed'] ?? '';
        $this->_public = $dto['public'] ?? '';
    }

    /**
     * Encoded with `base64`.
     */
    public function getSigned(): string
    {
        return $this->_signed;
    }

    public function getPublic(): string
    {
        return $this->_public;
    }

    /**
     * Encoded with `base64`.
     * @return self
     */
    public function setSigned(string $signed): self
    {
        $this->_signed = $signed;
        return $this;
    }

    /**
     * @return self
     */
    public function setPublic(string $public): self
    {
        $this->_public = $public;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_signed !== null) $result['signed'] = $this->_signed;
        if ($this->_public !== null) $result['public'] = $this->_public;
        return !empty($result) ? $result : new stdClass();
    }
}
