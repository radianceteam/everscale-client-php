<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ResultOfAppDebotBrowser_Approve extends ResultOfAppDebotBrowser implements JsonSerializable
{
    private bool $_approved;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_approved = $dto['approved'] ?? false;
    }

    public function isApproved(): bool
    {
        return $this->_approved;
    }

    /**
     * @return self
     */
    public function setApproved(bool $approved): self
    {
        $this->_approved = $approved;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Approve'];
        if ($this->_approved !== null) $result['approved'] = $this->_approved;
        return !empty($result) ? $result : new stdClass();
    }
}
