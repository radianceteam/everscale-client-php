<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class ParamsOfResolveAppRequest implements JsonSerializable
{
    private int $_appRequestId;
    private ?AppRequestResult $_result;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_appRequestId = $dto['app_request_id'] ?? 0;
        $this->_result = isset($dto['result']) ? AppRequestResult::create($dto['result']) : null;
    }

    public function getAppRequestId(): int
    {
        return $this->_appRequestId;
    }

    public function getResult(): ?AppRequestResult
    {
        return $this->_result;
    }

    /**
     * @return self
     */
    public function setAppRequestId(int $appRequestId): self
    {
        $this->_appRequestId = $appRequestId;
        return $this;
    }

    /**
     * @return self
     */
    public function setResult(?AppRequestResult $result): self
    {
        $this->_result = $result;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_appRequestId !== null) $result['app_request_id'] = $this->_appRequestId;
        if ($this->_result !== null) $result['result'] = $this->_result;
        return !empty($result) ? $result : new stdClass();
    }
}
