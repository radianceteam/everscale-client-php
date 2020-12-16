<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class DebotAction implements JsonSerializable
{
    /**
     * A short action description. Should be used by Debot Browser as name of
     *  menu item.
     */
    private string $_description;

    /**
     * Depends on action type. Can be a debot function name or a print string
     *  (for Print Action).
     */
    private string $_name;

    /** Action type. */
    private int $_actionType;

    /** ID of debot context to switch after action execution. */
    private int $_to;

    /**
     * Action attributes. In the form of "param=value,flag".
     *  attribute example: instant, args, fargs, sign.
     */
    private string $_attributes;

    /** Some internal action data. Used by debot only. */
    private string $_misc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_description = $dto['description'] ?? '';
        $this->_name = $dto['name'] ?? '';
        $this->_actionType = $dto['action_type'] ?? 0;
        $this->_to = $dto['to'] ?? 0;
        $this->_attributes = $dto['attributes'] ?? '';
        $this->_misc = $dto['misc'] ?? '';
    }

    /**
     * A short action description. Should be used by Debot Browser as name of
     *  menu item.
     */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     * Depends on action type. Can be a debot function name or a print string
     *  (for Print Action).
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * Action type.
     */
    public function getActionType(): int
    {
        return $this->_actionType;
    }

    /**
     * ID of debot context to switch after action execution.
     */
    public function getTo(): int
    {
        return $this->_to;
    }

    /**
     * Action attributes. In the form of "param=value,flag".
     *  attribute example: instant, args, fargs, sign.
     */
    public function getAttributes(): string
    {
        return $this->_attributes;
    }

    /**
     * Some internal action data. Used by debot only.
     */
    public function getMisc(): string
    {
        return $this->_misc;
    }

    /**
     * A short action description. Should be used by Debot Browser as name of
     *  menu item.
     */
    public function setDescription(string $description): self
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * Depends on action type. Can be a debot function name or a print string
     *  (for Print Action).
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * Action type.
     */
    public function setActionType(int $actionType): self
    {
        $this->_actionType = $actionType;
        return $this;
    }

    /**
     * ID of debot context to switch after action execution.
     */
    public function setTo(int $to): self
    {
        $this->_to = $to;
        return $this;
    }

    /**
     * Action attributes. In the form of "param=value,flag".
     *  attribute example: instant, args, fargs, sign.
     */
    public function setAttributes(string $attributes): self
    {
        $this->_attributes = $attributes;
        return $this;
    }

    /**
     * Some internal action data. Used by debot only.
     */
    public function setMisc(string $misc): self
    {
        $this->_misc = $misc;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_description !== null) $result['description'] = $this->_description;
        if ($this->_name !== null) $result['name'] = $this->_name;
        if ($this->_actionType !== null) $result['action_type'] = $this->_actionType;
        if ($this->_to !== null) $result['to'] = $this->_to;
        if ($this->_attributes !== null) $result['attributes'] = $this->_attributes;
        if ($this->_misc !== null) $result['misc'] = $this->_misc;
        return !empty($result) ? $result : new stdClass();
    }
}
