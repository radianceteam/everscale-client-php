<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;

class ParamsOfWaitForTransaction implements JsonSerializable
{
    /**
     * Optional ABI for decoding the transaction result.
     *
     *  If it is specified, then the output messages' bodies will be
     *  decoded according to this ABI.
     *
     *  The `abi_decoded` result field will be filled out.
     */
    private ?Abi $_abi;

    /** Message BOC. Encoded with `base64`. */
    private string $_message;

    /**
     * The last generated block id of the destination account shard before the message was sent.
     *
     *  You must provide the same value as the `send_message` has returned.
     */
    private string $_shardBlockId;

    /** Flag that enables/disables intermediate events */
    private bool $_sendEvents;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = Abi::create($dto['abi'] ?? []);
        $this->_message = $dto['message'] ?? '';
        $this->_shardBlockId = $dto['shard_block_id'] ?? '';
        $this->_sendEvents = $dto['send_events'] ?? false;
    }

    /**
     * Optional ABI for decoding the transaction result.
     *
     *  If it is specified, then the output messages' bodies will be
     *  decoded according to this ABI.
     *
     *  The `abi_decoded` result field will be filled out.
     */
    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Message BOC. Encoded with `base64`.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * The last generated block id of the destination account shard before the message was sent.
     *
     *  You must provide the same value as the `send_message` has returned.
     */
    public function getShardBlockId(): string
    {
        return $this->_shardBlockId;
    }

    /**
     * Flag that enables/disables intermediate events
     */
    public function isSendEvents(): bool
    {
        return $this->_sendEvents;
    }

    /**
     * Optional ABI for decoding the transaction result.
     *
     *  If it is specified, then the output messages' bodies will be
     *  decoded according to this ABI.
     *
     *  The `abi_decoded` result field will be filled out.
     */
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Message BOC. Encoded with `base64`.
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * The last generated block id of the destination account shard before the message was sent.
     *
     *  You must provide the same value as the `send_message` has returned.
     */
    public function setShardBlockId(string $shardBlockId): self
    {
        $this->_shardBlockId = $shardBlockId;
        return $this;
    }

    /**
     * Flag that enables/disables intermediate events
     */
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
        return $result;
    }
}
