<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class Encoded extends MessageSource implements JsonSerializable
{
    private string $_message;
    private ?Abi $_abi;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Encoded'];
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        return !empty($result) ? $result : new stdClass();
    }
}
