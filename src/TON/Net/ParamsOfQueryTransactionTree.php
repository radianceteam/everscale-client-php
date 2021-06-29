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

    /**
     * If some of the following messages and transactions are missing yet
     * The maximum waiting time is regulated by this option.
     *
     * Default value is 60000 (1 min).
     */
    private ?int $_timeout;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_inMsg = $dto['in_msg'] ?? '';
        $this->_abiRegistry = isset($dto['abi_registry']) ? array_map(function ($i) { return Abi::create($i); }, $dto['abi_registry']) : null;
        $this->_timeout = $dto['timeout'] ?? null;
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
     * If some of the following messages and transactions are missing yet
     * The maximum waiting time is regulated by this option.
     *
     * Default value is 60000 (1 min).
     */
    public function getTimeout(): ?int
    {
        return $this->_timeout;
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

    /**
     * If some of the following messages and transactions are missing yet
     * The maximum waiting time is regulated by this option.
     *
     * Default value is 60000 (1 min).
     * @return self
     */
    public function setTimeout(?int $timeout): self
    {
        $this->_timeout = $timeout;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_inMsg !== null) $result['in_msg'] = $this->_inMsg;
        if ($this->_abiRegistry !== null) $result['abi_registry'] = $this->_abiRegistry;
        if ($this->_timeout !== null) $result['timeout'] = $this->_timeout;
        return !empty($result) ? $result : new stdClass();
    }
}
