<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class DeploySet implements JsonSerializable
{
    /** Content of TVC file encoded in `base64`. */
    private string $_tvc;

    /** Target workchain for destination address. Default is `0`. */
    private int $_workchainId;

    /** List of initial values for contract's public variables. */
    private $_initialData;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_tvc = $dto['tvc'];
        $this->_workchainId = $dto['workchain_id'];
        $this->_initialData = new ($dto['initial_data']);
    }

    /**
     * Content of TVC file encoded in `base64`.
     */
    public function getTvc(): string
    {
        return $this->_tvc;
    }

    /**
     * Target workchain for destination address. Default is `0`.
     */
    public function getWorkchainId(): ?int
    {
        return $this->_workchainId;
    }

    /**
     * List of initial values for contract's public variables.
     */
    public function getInitialData()
    {
        return $this->_initialData;
    }

    /**
     * Content of TVC file encoded in `base64`.
     */
    public function setTvc(string $tvc): self
    {
        $this->_tvc = $tvc;
        return $this;
    }

    /**
     * Target workchain for destination address. Default is `0`.
     */
    public function setWorkchainId(?int $workchainId): self
    {
        $this->_workchainId = $workchainId;
        return $this;
    }

    /**
     * List of initial values for contract's public variables.
     */
    public function setInitialData($initialData): self
    {
        $this->_initialData = $initialData;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_tvc !== null) $result['tvc'] = $this->_tvc;
        if ($this->_workchainId !== null) $result['workchain_id'] = $this->_workchainId;
        if ($this->_initialData !== null) $result['initial_data'] = $this->_initialData;
        return $result;
    }
}
