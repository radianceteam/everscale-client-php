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
    private ?bool $_allowPartial;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_message = $dto['message'] ?? '';
        $this->_allowPartial = $dto['allow_partial'] ?? null;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function isAllowPartial(): ?bool
    {
        return $this->_allowPartial;
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
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * @return self
     */
    public function setAllowPartial(?bool $allowPartial): self
    {
        $this->_allowPartial = $allowPartial;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_allowPartial !== null) $result['allow_partial'] = $this->_allowPartial;
        return !empty($result) ? $result : new stdClass();
    }
}
