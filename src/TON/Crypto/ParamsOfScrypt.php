<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfScrypt implements JsonSerializable
{
    private string $_password;
    private string $_salt;
    private int $_logN;
    private int $_r;
    private int $_p;
    private int $_dkLen;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_password = $dto['password'] ?? '';
        $this->_salt = $dto['salt'] ?? '';
        $this->_logN = $dto['log_n'] ?? 0;
        $this->_r = $dto['r'] ?? 0;
        $this->_p = $dto['p'] ?? 0;
        $this->_dkLen = $dto['dk_len'] ?? 0;
    }

    public function getPassword(): string
    {
        return $this->_password;
    }

    public function getSalt(): string
    {
        return $this->_salt;
    }

    public function getLogN(): int
    {
        return $this->_logN;
    }

    public function getR(): int
    {
        return $this->_r;
    }

    public function getP(): int
    {
        return $this->_p;
    }

    public function getDkLen(): int
    {
        return $this->_dkLen;
    }

    public function setPassword(string $password): self
    {
        $this->_password = $password;
        return $this;
    }

    public function setSalt(string $salt): self
    {
        $this->_salt = $salt;
        return $this;
    }

    public function setLogN(int $logN): self
    {
        $this->_logN = $logN;
        return $this;
    }

    public function setR(int $r): self
    {
        $this->_r = $r;
        return $this;
    }

    public function setP(int $p): self
    {
        $this->_p = $p;
        return $this;
    }

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
        return !empty($result) ? $result : new stdClass();
    }
}
