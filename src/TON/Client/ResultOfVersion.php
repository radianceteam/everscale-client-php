<?php

namespace TON\Client;

use JsonSerializable;

class ResultOfVersion implements JsonSerializable
{
    /**
     * Core Library version
     */
    private string $_version;

    /**
     * ResultOfVersion constructor.
     * @param mixed|null $dto Optional data.
     */
    public function __construct($dto = null)
    {
        if ($dto) {
            $this->_version = $dto['version'] ?? '';
        }
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->_version;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_version !== null) {
            $result['version'] = $this->_version;
        }
        return $result;
    }
}