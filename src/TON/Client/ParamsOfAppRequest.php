<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class ParamsOfAppRequest implements JsonSerializable
{
    private int $_appRequestId;
    private $_requestData;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_appRequestId = $dto['app_request_id'] ?? 0;
        $this->_requestData = $dto['request_data'] ?? null;
    }

    public function getAppRequestId(): int
    {
        return $this->_appRequestId;
    }

    public function getRequestData()
    {
        return $this->_requestData;
    }

    public function setAppRequestId(int $appRequestId): self
    {
        $this->_appRequestId = $appRequestId;
        return $this;
    }

    public function setRequestData($requestData): self
    {
        $this->_requestData = $requestData;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_appRequestId !== null) $result['app_request_id'] = $this->_appRequestId;
        if ($this->_requestData !== null) $result['request_data'] = $this->_requestData;
        return !empty($result) ? $result : new stdClass();
    }
}
