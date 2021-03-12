<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfSend implements JsonSerializable
{
    private int $_debotHandle;
    private string $_message;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_debotHandle = $dto['debot_handle'] ?? 0;
        $this->_message = $dto['message'] ?? '';
    }

    public function getDebotHandle(): int
    {
        return $this->_debotHandle;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * @return self
     */
    public function setDebotHandle(int $debotHandle): self
    {
        $this->_debotHandle = $debotHandle;
        return $this;
    }

    /**
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_debotHandle !== null) $result['debot_handle'] = $this->_debotHandle;
        if ($this->_message !== null) $result['message'] = $this->_message;
        return !empty($result) ? $result : new stdClass();
    }
}
