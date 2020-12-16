<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfAppDebotBrowser_Log extends ParamsOfAppDebotBrowser implements JsonSerializable
{
    /** A string that must be printed to user. */
    private string $_msg;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_msg = $dto['msg'] ?? '';
    }

    /**
     * A string that must be printed to user.
     */
    public function getMsg(): string
    {
        return $this->_msg;
    }

    /**
     * A string that must be printed to user.
     */
    public function setMsg(string $msg): self
    {
        $this->_msg = $msg;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Log'];
        if ($this->_msg !== null) $result['msg'] = $this->_msg;
        return !empty($result) ? $result : new stdClass();
    }
}
