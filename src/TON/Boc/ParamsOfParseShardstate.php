<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;

class ParamsOfParseShardstate implements JsonSerializable
{
    /** BOC encoded as base64 */
    private string $_boc;

    /** Shardstate identificator */
    private string $_id;

    /** Workchain shardstate belongs to */
    private int $_workchainId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_boc = $dto['boc'] ?? '';
        $this->_id = $dto['id'] ?? '';
        $this->_workchainId = $dto['workchain_id'] ?? 0;
    }

    /**
     * BOC encoded as base64
     */
    public function getBoc(): string
    {
        return $this->_boc;
    }

    /**
     * Shardstate identificator
     */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
     * Workchain shardstate belongs to
     */
    public function getWorkchainId(): int
    {
        return $this->_workchainId;
    }

    /**
     * BOC encoded as base64
     */
    public function setBoc(string $boc): self
    {
        $this->_boc = $boc;
        return $this;
    }

    /**
     * Shardstate identificator
     */
    public function setId(string $id): self
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * Workchain shardstate belongs to
     */
    public function setWorkchainId(int $workchainId): self
    {
        $this->_workchainId = $workchainId;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_boc !== null) $result['boc'] = $this->_boc;
        if ($this->_id !== null) $result['id'] = $this->_id;
        if ($this->_workchainId !== null) $result['workchain_id'] = $this->_workchainId;
        return $result;
    }
}
