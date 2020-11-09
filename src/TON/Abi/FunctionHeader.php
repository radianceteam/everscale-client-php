<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class FunctionHeader implements JsonSerializable
{
    /**
     * Message expiration time in seconds.
     *  If not specified - calculated automatically from message_expiration_timeout(),
     *  try_index and message_expiration_timeout_grow_factor() (if ABI includes `expire` header).
     */
    private int $_expire;

    /**
     * Message creation time in milliseconds. If not specified, `now` is used
     *  (if ABI includes `time` header).
     */
    private BigInt $_time;

    /**
     * Public key is used by the contract to check the signature. Encoded in `hex`.
     *  If not specified, method fails with exception (if ABI includes `pubkey` header)..
     */
    private string $_pubkey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_expire = $dto['expire'];
        $this->_time = new BigInt($dto['time']);
        $this->_pubkey = $dto['pubkey'];
    }

    /**
     * Message expiration time in seconds.
     *  If not specified - calculated automatically from message_expiration_timeout(),
     *  try_index and message_expiration_timeout_grow_factor() (if ABI includes `expire` header).
     */
    public function getExpire(): ?int
    {
        return $this->_expire;
    }

    /**
     * Message creation time in milliseconds. If not specified, `now` is used
     *  (if ABI includes `time` header).
     */
    public function getTime(): ?BigInt
    {
        return $this->_time;
    }

    /**
     * Public key is used by the contract to check the signature. Encoded in `hex`.
     *  If not specified, method fails with exception (if ABI includes `pubkey` header)..
     */
    public function getPubkey(): ?string
    {
        return $this->_pubkey;
    }

    /**
     * Message expiration time in seconds.
     *  If not specified - calculated automatically from message_expiration_timeout(),
     *  try_index and message_expiration_timeout_grow_factor() (if ABI includes `expire` header).
     */
    public function setExpire(?int $expire): self
    {
        $this->_expire = $expire;
        return $this;
    }

    /**
     * Message creation time in milliseconds. If not specified, `now` is used
     *  (if ABI includes `time` header).
     */
    public function setTime(?BigInt $time): self
    {
        $this->_time = $time;
        return $this;
    }

    /**
     * Public key is used by the contract to check the signature. Encoded in `hex`.
     *  If not specified, method fails with exception (if ABI includes `pubkey` header)..
     */
    public function setPubkey(?string $pubkey): self
    {
        $this->_pubkey = $pubkey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_expire !== null) $result['expire'] = $this->_expire;
        if ($this->_time !== null) $result['time'] = $this->_time;
        if ($this->_pubkey !== null) $result['pubkey'] = $this->_pubkey;
        return $result;
    }
}
