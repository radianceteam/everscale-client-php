<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfAppDebotBrowser_Switch extends ParamsOfAppDebotBrowser implements JsonSerializable
{
    private int $_contextId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_contextId = $dto['context_id'] ?? 0;
    }

    public function getContextId(): int
    {
        return $this->_contextId;
    }

    public function setContextId(int $contextId): self
    {
        $this->_contextId = $contextId;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Switch'];
        if ($this->_contextId !== null) $result['context_id'] = $this->_contextId;
        return !empty($result) ? $result : new stdClass();
    }
}
