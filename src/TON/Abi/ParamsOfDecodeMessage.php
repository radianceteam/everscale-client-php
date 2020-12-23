<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfDecodeMessage implements JsonSerializable
{
    private ?Abi $_abi;
    private string $_message;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_message = $dto['message'] ?? '';
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_message !== null) $result['message'] = $this->_message;
        return !empty($result) ? $result : new stdClass();
    }
}
