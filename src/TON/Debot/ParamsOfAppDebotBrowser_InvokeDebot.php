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
    /** Address of debot in blockchain. */
    private string $_debotAddr;

    /** Debot action to execute. */
    private ?DebotAction $_action;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_debotAddr = $dto['debot_addr'] ?? '';
        $this->_action = isset($dto['action']) ? new DebotAction($dto['action']) : null;
    }

    /**
     * Address of debot in blockchain.
     */
    public function getDebotAddr(): string
    {
        return $this->_debotAddr;
    }

    /**
     * Debot action to execute.
     */
    public function getAction(): ?DebotAction
    {
        return $this->_action;
    }

    /**
     * Address of debot in blockchain.
     */
    public function setDebotAddr(string $debotAddr): self
    {
        $this->_debotAddr = $debotAddr;
        return $this;
    }

    /**
     * Debot action to execute.
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
