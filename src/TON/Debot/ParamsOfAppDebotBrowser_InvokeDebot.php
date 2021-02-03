<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfAppDebotBrowser_InvokeDebot extends ParamsOfAppDebotBrowser implements JsonSerializable
{
    private string $_debotAddr;
    private ?DebotAction $_action;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_debotAddr = $dto['debot_addr'] ?? '';
        $this->_action = isset($dto['action']) ? new DebotAction($dto['action']) : null;
    }

    public function getDebotAddr(): string
    {
        return $this->_debotAddr;
    }

    public function getAction(): ?DebotAction
    {
        return $this->_action;
    }

    /**
     * @return self
     */
    public function setDebotAddr(string $debotAddr): self
    {
        $this->_debotAddr = $debotAddr;
        return $this;
    }

    /**
     * @return self
     */
    public function setAction(?DebotAction $action): self
    {
        $this->_action = $action;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'InvokeDebot'];
        if ($this->_debotAddr !== null) $result['debot_addr'] = $this->_debotAddr;
        if ($this->_action !== null) $result['action'] = $this->_action;
        return !empty($result) ? $result : new stdClass();
    }
}
