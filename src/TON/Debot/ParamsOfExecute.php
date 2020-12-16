<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfExecute implements JsonSerializable
{
    /** Debot handle which references an instance of debot engine. */
    private int $_debotHandle;

    /** Debot Action that must be executed. */
    private ?DebotAction $_action;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_debotHandle = $dto['debot_handle'] ?? 0;
        $this->_action = isset($dto['action']) ? new DebotAction($dto['action']) : null;
    }

    /**
     * Debot handle which references an instance of debot engine.
     */
    public function getDebotHandle(): int
    {
        return $this->_debotHandle;
    }

    /**
     * Debot Action that must be executed.
     */
    public function getAction(): ?DebotAction
    {
        return $this->_action;
    }

    /**
     * Debot handle which references an instance of debot engine.
     */
    public function setDebotHandle(int $debotHandle): self
    {
        $this->_debotHandle = $debotHandle;
        return $this;
    }

    /**
     * Debot Action that must be executed.
     */
    public function setAction(?DebotAction $action): self
    {
        $this->_action = $action;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_debotHandle !== null) $result['debot_handle'] = $this->_debotHandle;
        if ($this->_action !== null) $result['action'] = $this->_action;
        return !empty($result) ? $result : new stdClass();
    }
}
