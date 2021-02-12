<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfBocCacheUnpin implements JsonSerializable
{
    private string $_pin;

    /** If it is provided then only referenced BOC is unpinned */
    private ?string $_bocRef;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_pin = $dto['pin'] ?? '';
        $this->_bocRef = $dto['boc_ref'] ?? null;
    }

    public function getPin(): string
    {
        return $this->_pin;
    }

    /**
     * If it is provided then only referenced BOC is unpinned
     */
    public function getBocRef(): ?string
    {
        return $this->_bocRef;
    }

    /**
     * @return self
     */
    public function setPin(string $pin): self
    {
        $this->_pin = $pin;
        return $this;
    }

    /**
     * If it is provided then only referenced BOC is unpinned
     * @return self
     */
    public function setBocRef(?string $bocRef): self
    {
        $this->_bocRef = $bocRef;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_pin !== null) $result['pin'] = $this->_pin;
        if ($this->_bocRef !== null) $result['boc_ref'] = $this->_bocRef;
        return !empty($result) ? $result : new stdClass();
    }
}
