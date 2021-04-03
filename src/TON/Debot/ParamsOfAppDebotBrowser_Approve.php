<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfAppDebotBrowser_Approve extends ParamsOfAppDebotBrowser implements JsonSerializable
{
    private ?DebotActivity $_activity;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_activity = isset($dto['activity']) ? DebotActivity::create($dto['activity']) : null;
    }

    public function getActivity(): ?DebotActivity
    {
        return $this->_activity;
    }

    /**
     * @return self
     */
    public function setActivity(?DebotActivity $activity): self
    {
        $this->_activity = $activity;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Approve'];
        if ($this->_activity !== null) $result['activity'] = $this->_activity;
        return !empty($result) ? $result : new stdClass();
    }
}
