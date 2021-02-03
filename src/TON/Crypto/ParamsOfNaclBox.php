<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfNaclBox implements JsonSerializable
{
    private string $_decrypted;
    private string $_nonce;
    private string $_theirPublic;
    private string $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_decrypted = $dto['decrypted'] ?? '';
        $this->_nonce = $dto['nonce'] ?? '';
        $this->_theirPublic = $dto['their_public'] ?? '';
        $this->_secret = $dto['secret'] ?? '';
    }

    public function getDecrypted(): string
    {
        return $this->_decrypted;
    }

    public function getNonce(): string
    {
        return $this->_nonce;
    }

    public function getTheirPublic(): string
    {
        return $this->_theirPublic;
    }

    public function getSecret(): string
    {
        return $this->_secret;
    }

    /**
     * @return self
     */
    public function setDecrypted(string $decrypted): self
    {
        $this->_decrypted = $decrypted;
        return $this;
    }

    /**
     * @return self
     */
    public function setNonce(string $nonce): self
    {
        $this->_nonce = $nonce;
        return $this;
    }

    /**
     * @return self
     */
    public function setTheirPublic(string $theirPublic): self
    {
        $this->_theirPublic = $theirPublic;
        return $this;
    }

    /**
     * @return self
     */
    public function setSecret(string $secret): self
    {
        $this->_secret = $secret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_decrypted !== null) $result['decrypted'] = $this->_decrypted;
        if ($this->_nonce !== null) $result['nonce'] = $this->_nonce;
        if ($this->_theirPublic !== null) $result['their_public'] = $this->_theirPublic;
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return !empty($result) ? $result : new stdClass();
    }
}
