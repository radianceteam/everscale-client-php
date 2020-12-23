<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use TON\Abi\Abi;
use stdClass;

class ParamsOfWaitForTransaction implements JsonSerializable
{
    /**
     * If it is specified, then the output messages' bodies will be
     * decoded according to this ABI.
     *
     * The `abi_decoded` result field will be filled out.
     */
    private ?Abi $_abi;

    /** Encoded with `base64`. */
    private string $_message;

    /** You must provide the same value as the `send_message` has returned. */
    private string $_shardBlockId;
    private bool $_sendEvents;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_message = $dto['message'] ?? '';
        $this->_shardBlockId = $dto['shard_block_id'] ?? '';
        $this->_sendEvents = $dto['send_events'] ?? false;
    }

    /**
     * If it is specified, then the output messages' bodies will be
     * decoded according to this ABI.
     *
     * The `abi_decoded` result field will be filled out.
     */
    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Encoded with `base64`.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * You must provide the same value as the `send_message` has returned.
     */
    public function getShardBlockId(): string
    {
        return $this->_shardBlockId;
    }

    public function isSendEvents(): bool
    {
        return $this->_sendEvents;
    }

    /**
     * If it is specified, then the output messages' bodies will be
     * decoded according to this ABI.
     *
     * The `abi_decoded` result field will be filled out.
     */
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Encoded with `base64`.
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * You must provide the same value as the `send_message` has returned.
     */
    public function setShardBlockId(string $shardBlockId): self
    {
        $this->_shardBlockId = $shardBlockId;
        return $this;
    }

    public function setSendEvents(bool $sendEvents): self
    {
        $this->_sendEvents = $sendEvents;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_shardBlockId !== null) $result['shard_block_id'] = $this->_shardBlockId;
        if ($this->_sendEvents !== null) $result['send_events'] = $this->_sendEvents;
        return !empty($result) ? $result : new stdClass();
    }
}
