<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ResultOfAppDebotBrowser_Input extends ResultOfAppDebotBrowser implements JsonSerializable
{
    /** String entered by user. */
    private string $_value;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_value = $dto['value'] ?? '';
    }

    /**
     * String entered by user.
     */
    public function getValue(): string
    {
        return $this->_value;
    }

    /**
     * String entered by user.
     */
    public function setValue(string $value): self
    {
        $this->_value = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Input'];
        if ($this->_value !== null) $result['value'] = $this->_value;
        return !empty($result) ? $result : new stdClass();
    }
}
