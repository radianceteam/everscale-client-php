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
    /** Should be used by Debot Browser as name of menu item. */
    private string $_description;

    /** Can be a debot function name or a print string (for Print Action). */
    private string $_name;
    private int $_actionType;
    private int $_to;

    /** In the form of "param=value,flag". attribute example: instant, args, fargs, sign. */
    private string $_attributes;

    /** Used by debot only. */
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
     * Should be used by Debot Browser as name of menu item.
     */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     * Can be a debot function name or a print string (for Print Action).
     */
    public function getName(): string
    {
        return $this->_name;
    }

    public function getActionType(): int
    {
        return $this->_actionType;
    }

    public function getTo(): int
    {
        return $this->_to;
    }

    /**
     * In the form of "param=value,flag". attribute example: instant, args, fargs, sign.
     */
    public function getAttributes(): string
    {
        return $this->_attributes;
    }

    /**
     * Used by debot only.
     */
    public function getMisc(): string
    {
        return $this->_misc;
    }

    /**
     * Should be used by Debot Browser as name of menu item.
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * Can be a debot function name or a print string (for Print Action).
     * @return self
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return self
     */
    public function setActionType(int $actionType): self
    {
        $this->_actionType = $actionType;
        return $this;
    }

    /**
     * @return self
     */
    public function setTo(int $to): self
    {
        $this->_to = $to;
        return $this;
    }

    /**
     * In the form of "param=value,flag". attribute example: instant, args, fargs, sign.
     * @return self
     */
    public function setAttributes(string $attributes): self
    {
        $this->_attributes = $attributes;
        return $this;
    }

    /**
     * Used by debot only.
     * @return self
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
