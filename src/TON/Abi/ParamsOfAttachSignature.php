<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfAttachSignature implements JsonSerializable
{
    private ?Abi $_abi;
    private string $_publicKey;
    private string $_message;
    private string $_signature;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_publicKey = $dto['public_key'] ?? '';
        $this->_message = $dto['message'] ?? '';
        $this->_signature = $dto['signature'] ?? '';
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getPublicKey(): string
    {
        return $this->_publicKey;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function getSignature(): string
    {
        return $this->_signature;
    }

    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    public function setPublicKey(string $publicKey): self
    {
        $this->_publicKey = $publicKey;
        return $this;
    }

    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    public function setSignature(string $signature): self
    {
        $this->_signature = $signature;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_publicKey !== null) $result['public_key'] = $this->_publicKey;
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_signature !== null) $result['signature'] = $this->_signature;
        return !empty($result) ? $result : new stdClass();
    }
}
