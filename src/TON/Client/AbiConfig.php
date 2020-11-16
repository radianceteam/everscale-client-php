<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class AbiConfig implements JsonSerializable
{
    private ?int $_workchain;
    private ?int $_messageExpirationTimeout;
    private ?float $_messageExpirationTimeoutGrowFactor;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_workchain = $dto['workchain'] ?? null;
        $this->_messageExpirationTimeout = $dto['message_expiration_timeout'] ?? null;
        $this->_messageExpirationTimeoutGrowFactor = $dto['message_expiration_timeout_grow_factor'] ?? null;
    }

    public function getWorkchain(): ?int
    {
        return $this->_workchain;
    }

    public function getMessageExpirationTimeout(): ?int
    {
        return $this->_messageExpirationTimeout;
    }

    public function getMessageExpirationTimeoutGrowFactor(): ?float
    {
        return $this->_messageExpirationTimeoutGrowFactor;
    }

    public function setWorkchain(?int $workchain): self
    {
        $this->_workchain = $workchain;
        return $this;
    }

    public function setMessageExpirationTimeout(?int $messageExpirationTimeout): self
    {
        $this->_messageExpirationTimeout = $messageExpirationTimeout;
        return $this;
    }

    public function setMessageExpirationTimeoutGrowFactor(?float $messageExpirationTimeoutGrowFactor): self
    {
        $this->_messageExpirationTimeoutGrowFactor = $messageExpirationTimeoutGrowFactor;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_workchain !== null) $result['workchain'] = $this->_workchain;
        if ($this->_messageExpirationTimeout !== null) $result['message_expiration_timeout'] = $this->_messageExpirationTimeout;
        if ($this->_messageExpirationTimeoutGrowFactor !== null) $result['message_expiration_timeout_grow_factor'] = $this->_messageExpirationTimeoutGrowFactor;
        return !empty($result) ? $result : new stdClass();
    }
}
