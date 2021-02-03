<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class AppRequestResult_Error extends AppRequestResult implements JsonSerializable
{
    private string $_text;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_text = $dto['text'] ?? '';
    }

    public function getText(): string
    {
        return $this->_text;
    }

    /**
     * @return self
     */
    public function setText(string $text): self
    {
        $this->_text = $text;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Error'];
        if ($this->_text !== null) $result['text'] = $this->_text;
        return !empty($result) ? $result : new stdClass();
    }
}
