<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class Message extends StateInitSource implements JsonSerializable
{
    private MessageSource $_source;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_source = MessageSource::create($dto['source'] ?? []);
    }

    public function getSource(): MessageSource
    {
        return $this->_source;
    }

    public function setSource(MessageSource $source): self
    {
        $this->_source = $source;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Message'];
        if ($this->_source !== null) $result['source'] = $this->_source;
        return $result;
    }
}
