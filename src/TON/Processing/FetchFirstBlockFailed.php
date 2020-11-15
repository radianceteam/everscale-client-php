<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;

class FetchFirstBlockFailed extends ProcessingEvent implements JsonSerializable
{
    private ClientError $_error;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_error = new ClientError($dto['error'] ?? []);
    }

    public function getError(): ClientError
    {
        return $this->_error;
    }

    public function setError(ClientError $error): self
    {
        $this->_error = $error;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'FetchFirstBlockFailed'];
        if ($this->_error !== null) $result['error'] = $this->_error;
        return $result;
    }
}
