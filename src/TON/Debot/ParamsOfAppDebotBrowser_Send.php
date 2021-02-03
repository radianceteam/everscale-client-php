<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfAppDebotBrowser_Send extends ParamsOfAppDebotBrowser implements JsonSerializable
{
    /** Message body contains interface function and parameters. */
    private string $_message;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
    }

    /**
     * Message body contains interface function and parameters.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Message body contains interface function and parameters.
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Send'];
        if ($this->_message !== null) $result['message'] = $this->_message;
        return !empty($result) ? $result : new stdClass();
    }
}
