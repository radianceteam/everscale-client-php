<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ParamsOfDecodeMessageBody implements JsonSerializable
{
    /** Contract ABI used to decode. */
    private Abi $_abi;

    /** Message body BOC encoded in `base64`. */
    private string $_body;

    /** True if the body belongs to the internal message. */
    private bool $_isInternal;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = Abi::create($dto['abi'] ?? []);
        $this->_body = $dto['body'] ?? '';
        $this->_isInternal = $dto['is_internal'] ?? false;
    }

    /**
     * Contract ABI used to decode.
     */
    public function getAbi(): Abi
    {
        return $this->_abi;
    }

    /**
     * Message body BOC encoded in `base64`.
     */
    public function getBody(): string
    {
        return $this->_body;
    }

    /**
     * True if the body belongs to the internal message.
     */
    public function isIsInternal(): bool
    {
        return $this->_isInternal;
    }

    /**
     * Contract ABI used to decode.
     */
    public function setAbi(Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Message body BOC encoded in `base64`.
     */
    public function setBody(string $body): self
    {
        $this->_body = $body;
        return $this;
    }

    /**
     * True if the body belongs to the internal message.
     */
    public function setIsInternal(bool $isInternal): self
    {
        $this->_isInternal = $isInternal;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_body !== null) $result['body'] = $this->_body;
        if ($this->_isInternal !== null) $result['is_internal'] = $this->_isInternal;
        return $result;
    }
}
