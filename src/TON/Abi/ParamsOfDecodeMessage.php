<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ParamsOfDecodeMessage implements JsonSerializable
{
    /** contract ABI */
    private Abi $_abi;

    /** Message BOC */
    private string $_message;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = Abi::create($dto['abi'] ?? []);
        $this->_message = $dto['message'] ?? '';
    }

    /**
     * contract ABI
     */
    public function getAbi(): Abi
    {
        return $this->_abi;
    }

    /**
     * Message BOC
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * contract ABI
     */
    public function setAbi(Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Message BOC
     */
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
        return $result;
    }
}
