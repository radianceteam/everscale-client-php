<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ResultOfGetCodeSalt implements JsonSerializable
{
    /** BOC encoded as base64 or BOC handle */
    private ?string $_salt;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_salt = $dto['salt'] ?? null;
    }

    /**
     * BOC encoded as base64 or BOC handle
     */
    public function getSalt(): ?string
    {
        return $this->_salt;
    }

    /**
     * BOC encoded as base64 or BOC handle
     * @return self
     */
    public function setSalt(?string $salt): self
    {
        $this->_salt = $salt;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_salt !== null) $result['salt'] = $this->_salt;
        return !empty($result) ? $result : new stdClass();
    }
}
