<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class ResultOfVersion implements JsonSerializable
{
    private string $_version;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_version = $dto['version'] ?? '';
    }

    public function getVersion(): string
    {
        return $this->_version;
    }

    public function setVersion(string $version): self
    {
        $this->_version = $version;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_version !== null) $result['version'] = $this->_version;
        return !empty($result) ? $result : new stdClass();
    }
}
