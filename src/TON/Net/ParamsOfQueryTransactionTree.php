<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use TON\Abi\Abi;
use stdClass;

class ParamsOfQueryTransactionTree implements JsonSerializable
{
    private string $_inMsg;

    /** @var Abi[]|null */
    private ?array $_abiRegistry;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_inMsg = $dto['in_msg'] ?? '';
        $this->_abiRegistry = isset($dto['abi_registry']) ? array_map(function ($i) { return Abi::create($i); }, $dto['abi_registry']) : null;
    }

    public function getInMsg(): string
    {
        return $this->_inMsg;
    }

    /**
     * @return Abi[]|null
     */
    public function getAbiRegistry(): ?array
    {
        return $this->_abiRegistry;
    }

    /**
     * @return self
     */
    public function setInMsg(string $inMsg): self
    {
        $this->_inMsg = $inMsg;
        return $this;
    }

    /**
     * @param Abi[]|null $abiRegistry
     * @return self
     */
    public function setAbiRegistry(?array $abiRegistry): self
    {
        $this->_abiRegistry = $abiRegistry;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_inMsg !== null) $result['in_msg'] = $this->_inMsg;
        if ($this->_abiRegistry !== null) $result['abi_registry'] = $this->_abiRegistry;
        return !empty($result) ? $result : new stdClass();
    }
}
