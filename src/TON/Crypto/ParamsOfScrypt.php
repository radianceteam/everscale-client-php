<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;

class ParamsOfScrypt implements JsonSerializable
{
    /**
     * The password bytes to be hashed.
     *  Must be encoded with `base64`.
     */
    private string $_password;

    /**
     * Salt bytes that modify the hash to protect against Rainbow table attacks.
     *  Must be encoded with `base64`.
     */
    private string $_salt;

    /** CPU/memory cost parameter */
    private int $_logN;

    /** The block size parameter, which fine-tunes sequential memory read size and performance. */
    private int $_r;

    /** Parallelization parameter. */
    private int $_p;

    /** Intended output length in octets of the derived key. */
    private int $_dkLen;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_password = $dto['password'];
        $this->_salt = $dto['salt'];
        $this->_logN = $dto['log_n'];
        $this->_r = $dto['r'];
        $this->_p = $dto['p'];
        $this->_dkLen = $dto['dk_len'];
    }

    /**
     * The password bytes to be hashed.
     *  Must be encoded with `base64`.
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * Salt bytes that modify the hash to protect against Rainbow table attacks.
     *  Must be encoded with `base64`.
     */
    public function getSalt(): string
    {
        return $this->_salt;
    }

    /**
     * CPU/memory cost parameter
     */
    public function getLogN(): int
    {
        return $this->_logN;
    }

    /**
     * The block size parameter, which fine-tunes sequential memory read size and performance.
     */
    public function getR(): int
    {
        return $this->_r;
    }

    /**
     * Parallelization parameter.
     */
    public function getP(): int
    {
        return $this->_p;
    }

    /**
     * Intended output length in octets of the derived key.
     */
    public function getDkLen(): int
    {
        return $this->_dkLen;
    }

    /**
     * The password bytes to be hashed.
     *  Must be encoded with `base64`.
     */
    public function setPassword(string $password): self
    {
        $this->_password = $password;
        return $this;
    }

    /**
     * Salt bytes that modify the hash to protect against Rainbow table attacks.
     *  Must be encoded with `base64`.
     */
    public function setSalt(string $salt): self
    {
        $this->_salt = $salt;
        return $this;
    }

    /**
     * CPU/memory cost parameter
     */
    public function setLogN(int $logN): self
    {
        $this->_logN = $logN;
        return $this;
    }

    /**
     * The block size parameter, which fine-tunes sequential memory read size and performance.
     */
    public function setR(int $r): self
    {
        $this->_r = $r;
        return $this;
    }

    /**
     * Parallelization parameter.
     */
    public function setP(int $p): self
    {
        $this->_p = $p;
        return $this;
    }

    /**
     * Intended output length in octets of the derived key.
     */
    public function setDkLen(int $dkLen): self
    {
        $this->_dkLen = $dkLen;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_password !== null) $result['password'] = $this->_password;
        if ($this->_salt !== null) $result['salt'] = $this->_salt;
        if ($this->_logN !== null) $result['log_n'] = $this->_logN;
        if ($this->_r !== null) $result['r'] = $this->_r;
        if ($this->_p !== null) $result['p'] = $this->_p;
        if ($this->_dkLen !== null) $result['dk_len'] = $this->_dkLen;
        return $result;
    }
}
