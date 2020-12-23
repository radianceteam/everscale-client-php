<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ResultOfAppDebotBrowser_GetSigningBox extends ResultOfAppDebotBrowser implements JsonSerializable
{
    /** Signing box is owned and disposed by debot engine */
    private int $_signingBox;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_signingBox = $dto['signing_box'] ?? 0;
    }

    /**
     * Signing box is owned and disposed by debot engine
     */
    public function getSigningBox(): int
    {
        return $this->_signingBox;
    }

    /**
     * Signing box is owned and disposed by debot engine
     */
    public function setSigningBox(int $signingBox): self
    {
        $this->_signingBox = $signingBox;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'GetSigningBox'];
        if ($this->_signingBox !== null) $result['signing_box'] = $this->_signingBox;
        return !empty($result) ? $result : new stdClass();
    }
}
