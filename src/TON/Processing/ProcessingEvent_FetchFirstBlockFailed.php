<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use TON\Client\ClientError;
use stdClass;

class ProcessingEvent_FetchFirstBlockFailed extends ProcessingEvent implements JsonSerializable
{
    private ?ClientError $_error;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_error = isset($dto['error']) ? new ClientError($dto['error']) : null;
    }

    public function getError(): ?ClientError
    {
        return $this->_error;
    }

    /**
     * @return self
     */
    public function setError(?ClientError $error): self
    {
        $this->_error = $error;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'FetchFirstBlockFailed'];
        if ($this->_error !== null) $result['error'] = $this->_error;
        return !empty($result) ? $result : new stdClass();
    }
}
