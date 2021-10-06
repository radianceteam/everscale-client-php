<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use TON\Boc\BocCacheType;
use stdClass;

class ParamsOfUpdateInitialData implements JsonSerializable
{
    private ?Abi $_abi;
    private string $_data;

    /** `abi` parameter should be provided to set initial data */
    private $_initialData;
    private ?string $_initialPubkey;
    private ?BocCacheType $_bocCache;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_data = $dto['data'] ?? '';
        $this->_initialData = $dto['initial_data'] ?? null;
        $this->_initialPubkey = $dto['initial_pubkey'] ?? null;
        $this->_bocCache = isset($dto['boc_cache']) ? BocCacheType::create($dto['boc_cache']) : null;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function getData(): string
    {
        return $this->_data;
    }

    /**
     * `abi` parameter should be provided to set initial data
     */
    public function getInitialData()
    {
        return $this->_initialData;
    }

    public function getInitialPubkey(): ?string
    {
        return $this->_initialPubkey;
    }

    public function getBocCache(): ?BocCacheType
    {
        return $this->_bocCache;
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
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * `abi` parameter should be provided to set initial data
     * @return self
     */
    public function setInitialData($initialData): self
    {
        $this->_initialData = $initialData;
        return $this;
    }

    /**
     * @return self
     */
    public function setInitialPubkey(?string $initialPubkey): self
    {
        $this->_initialPubkey = $initialPubkey;
        return $this;
    }

    /**
     * @return self
     */
    public function setBocCache(?BocCacheType $bocCache): self
    {
        $this->_bocCache = $bocCache;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_data !== null) $result['data'] = $this->_data;
        if ($this->_initialData !== null) $result['initial_data'] = $this->_initialData;
        if ($this->_initialPubkey !== null) $result['initial_pubkey'] = $this->_initialPubkey;
        if ($this->_bocCache !== null) $result['boc_cache'] = $this->_bocCache;
        return !empty($result) ? $result : new stdClass();
    }
}
