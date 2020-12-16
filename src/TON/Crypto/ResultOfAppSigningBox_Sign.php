<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfAppSigningBox_Sign extends ResultOfAppSigningBox implements JsonSerializable
{
    /** Data signature encoded as hex */
    private string $_signature;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signature = $dto['signature'] ?? '';
    }

    /**
     * Data signature encoded as hex
     */
    public function getSignature(): string
    {
        return $this->_signature;
    }

    /**
     * Data signature encoded as hex
     */
    public function setSignature(string $signature): self
    {
        $this->_signature = $signature;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Sign'];
        if ($this->_signature !== null) $result['signature'] = $this->_signature;
        return !empty($result) ? $result : new stdClass();
    }
}
