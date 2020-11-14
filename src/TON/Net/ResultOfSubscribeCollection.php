<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;

class ResultOfSubscribeCollection implements JsonSerializable
{
    /** Subscription handle. Must be closed with `unsubscribe` */
    private int $_handle;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_handle = $dto['handle'] ?? 0;
    }

    /**
     * Subscription handle. Must be closed with `unsubscribe`
     */
    public function getHandle(): int
    {
        return $this->_handle;
    }

    /**
     * Subscription handle. Must be closed with `unsubscribe`
     */
    public function setHandle(int $handle): self
    {
        $this->_handle = $handle;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_handle !== null) $result['handle'] = $this->_handle;
        return $result;
    }
}
