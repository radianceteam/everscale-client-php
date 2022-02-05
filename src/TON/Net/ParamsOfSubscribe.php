<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfSubscribe implements JsonSerializable
{
    private string $_subscription;

    /** Must be a map with named values that can be used in query. */
    private $_variables;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_subscription = $dto['subscription'] ?? '';
        $this->_variables = $dto['variables'] ?? null;
    }

    public function getSubscription(): string
    {
        return $this->_subscription;
    }

    /**
     * Must be a map with named values that can be used in query.
     */
    public function getVariables()
    {
        return $this->_variables;
    }

    /**
     * @return self
     */
    public function setSubscription(string $subscription): self
    {
        $this->_subscription = $subscription;
        return $this;
    }

    /**
     * Must be a map with named values that can be used in query.
     * @return self
     */
    public function setVariables($variables): self
    {
        $this->_variables = $variables;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_subscription !== null) $result['subscription'] = $this->_subscription;
        if ($this->_variables !== null) $result['variables'] = $this->_variables;
        return !empty($result) ? $result : new stdClass();
    }
}
