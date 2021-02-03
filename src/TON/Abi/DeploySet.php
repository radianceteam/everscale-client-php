<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class DeploySet implements JsonSerializable
{
    private string $_tvc;

    /** Default is `0`. */
    private ?int $_workchainId;
    private $_initialData;

    /**
     * Public key resolving priority:
     * 1. Public key from deploy set.
     * 2. Public key, specified in TVM file.
     * 3. Public key, provided by Signer.
     */
    private ?string $_initialPubkey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_tvc = $dto['tvc'] ?? '';
        $this->_workchainId = $dto['workchain_id'] ?? null;
        $this->_initialData = $dto['initial_data'] ?? null;
        $this->_initialPubkey = $dto['initial_pubkey'] ?? null;
    }

    public function getTvc(): string
    {
        return $this->_tvc;
    }

    /**
     * Default is `0`.
     */
    public function getWorkchainId(): ?int
    {
        return $this->_workchainId;
    }

    public function getInitialData()
    {
        return $this->_initialData;
    }

    /**
     * Public key resolving priority:
     * 1. Public key from deploy set.
     * 2. Public key, specified in TVM file.
     * 3. Public key, provided by Signer.
     */
    public function getInitialPubkey(): ?string
    {
        return $this->_initialPubkey;
    }

    /**
     * @return self
     */
    public function setTvc(string $tvc): self
    {
        $this->_tvc = $tvc;
        return $this;
    }

    /**
     * Default is `0`.
     * @return self
     */
    public function setWorkchainId(?int $workchainId): self
    {
        $this->_workchainId = $workchainId;
        return $this;
    }

    /**
     * @return self
     */
    public function setInitialData($initialData): self
    {
        $this->_initialData = $initialData;
        return $this;
    }

    /**
     * Public key resolving priority:
     * 1. Public key from deploy set.
     * 2. Public key, specified in TVM file.
     * 3. Public key, provided by Signer.
     * @return self
     */
    public function setInitialPubkey(?string $initialPubkey): self
    {
        $this->_initialPubkey = $initialPubkey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_tvc !== null) $result['tvc'] = $this->_tvc;
        if ($this->_workchainId !== null) $result['workchain_id'] = $this->_workchainId;
        if ($this->_initialData !== null) $result['initial_data'] = $this->_initialData;
        if ($this->_initialPubkey !== null) $result['initial_pubkey'] = $this->_initialPubkey;
        return !empty($result) ? $result : new stdClass();
    }
}
