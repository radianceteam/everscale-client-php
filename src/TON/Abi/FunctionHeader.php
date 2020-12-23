<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class FunctionHeader implements JsonSerializable
{
    private ?int $_expire;

    /** If not specified, `now` is used(if ABI includes `time` header). */
    private ?int $_time;

    /** Encoded in `hex`.If not specified, method fails with exception (if ABI includes `pubkey` header).. */
    private ?string $_pubkey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_expire = $dto['expire'] ?? null;
        $this->_time = $dto['time'] ?? null;
        $this->_pubkey = $dto['pubkey'] ?? null;
    }

    public function getExpire(): ?int
    {
        return $this->_expire;
    }

    /**
     * If not specified, `now` is used(if ABI includes `time` header).
     */
    public function getTime(): ?int
    {
        return $this->_time;
    }

    /**
     * Encoded in `hex`.If not specified, method fails with exception (if ABI includes `pubkey` header)..
     */
    public function getPubkey(): ?string
    {
        return $this->_pubkey;
    }

    public function setExpire(?int $expire): self
    {
        $this->_expire = $expire;
        return $this;
    }

    /**
     * If not specified, `now` is used(if ABI includes `time` header).
     */
    public function setTime(?int $time): self
    {
        $this->_time = $time;
        return $this;
    }

    /**
     * Encoded in `hex`.If not specified, method fails with exception (if ABI includes `pubkey` header)..
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
        return !empty($result) ? $result : new stdClass();
    }
}
