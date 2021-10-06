<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfDecodeInitialData implements JsonSerializable
{
    /** Initial data is decoded if `abi` input parameter is provided */
    private $_initialData;
    private string $_initialPubkey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_initialData = $dto['initial_data'] ?? null;
        $this->_initialPubkey = $dto['initial_pubkey'] ?? '';
    }

    /**
     * Initial data is decoded if `abi` input parameter is provided
     */
    public function getInitialData()
    {
        return $this->_initialData;
    }

    public function getInitialPubkey(): string
    {
        return $this->_initialPubkey;
    }

    /**
     * Initial data is decoded if `abi` input parameter is provided
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
    public function setInitialPubkey(string $initialPubkey): self
    {
        $this->_initialPubkey = $initialPubkey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_initialData !== null) $result['initial_data'] = $this->_initialData;
        if ($this->_initialPubkey !== null) $result['initial_pubkey'] = $this->_initialPubkey;
        return !empty($result) ? $result : new stdClass();
    }
}
