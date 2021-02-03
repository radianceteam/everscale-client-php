<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfDecodeMessageBody implements JsonSerializable
{
    private ?Abi $_abi;
    private string $_body;
    private bool $_isInternal;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_body = $dto['body'] ?? '';
        $this->_isInternal = $dto['is_internal'] ?? false;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getBody(): string
    {
        return $this->_body;
    }

    public function isIsInternal(): bool
    {
        return $this->_isInternal;
    }

    /**
     * @return self
     */
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * @return self
     */
    public function setBody(string $body): self
    {
        $this->_body = $body;
        return $this;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
