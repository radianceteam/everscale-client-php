<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Proofs;

use JsonSerializable;
use stdClass;

class ParamsOfProofMessageData implements JsonSerializable
{
    private $_message;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? null;
    }

    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @return self
     */
    public function setMessage($message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_message !== null) $result['message'] = $this->_message;
        return !empty($result) ? $result : new stdClass();
    }
}
