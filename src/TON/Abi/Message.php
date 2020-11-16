<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class Message extends StateInitSource implements JsonSerializable
{
    private ?MessageSource $_source;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_source = isset($dto['source']) ? MessageSource::create($dto['source']) : null;
    }

    public function getSource(): ?MessageSource
    {
        return $this->_source;
    }

    public function setSource(?MessageSource $source): self
    {
        $this->_source = $source;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Message'];
        if ($this->_source !== null) $result['source'] = $this->_source;
        return !empty($result) ? $result : new stdClass();
    }
}
