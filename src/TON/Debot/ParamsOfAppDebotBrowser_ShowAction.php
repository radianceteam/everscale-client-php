<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfAppDebotBrowser_ShowAction extends ParamsOfAppDebotBrowser implements JsonSerializable
{
    /**
     * Debot action that must be shown to user as menu item.
     *  At least `description` property must be shown from [DebotAction] structure.
     */
    private ?DebotAction $_action;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_action = isset($dto['action']) ? new DebotAction($dto['action']) : null;
    }

    /**
     * Debot action that must be shown to user as menu item.
     *  At least `description` property must be shown from [DebotAction] structure.
     */
    public function getAction(): ?DebotAction
    {
        return $this->_action;
    }

    /**
     * Debot action that must be shown to user as menu item.
     *  At least `description` property must be shown from [DebotAction] structure.
     */
    public function setAction(?DebotAction $action): self
    {
        $this->_action = $action;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'ShowAction'];
        if ($this->_action !== null) $result['action'] = $this->_action;
        return !empty($result) ? $result : new stdClass();
    }
}
