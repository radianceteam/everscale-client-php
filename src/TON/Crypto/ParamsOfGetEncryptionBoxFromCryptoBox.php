<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfGetEncryptionBoxFromCryptoBox implements JsonSerializable
{
    private int $_handle;

    /** By default, Everscale HD path is used. */
    private ?string $_hdpath;
    private ?BoxEncryptionAlgorithm $_algorithm;
    private ?int $_secretLifetime;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_handle = $dto['handle'] ?? 0;
        $this->_hdpath = $dto['hdpath'] ?? null;
        $this->_algorithm = isset($dto['algorithm']) ? BoxEncryptionAlgorithm::create($dto['algorithm']) : null;
        $this->_secretLifetime = $dto['secret_lifetime'] ?? null;
    }

    public function getHandle(): int
    {
        return $this->_handle;
    }

    /**
     * By default, Everscale HD path is used.
     */
    public function getHdpath(): ?string
    {
        return $this->_hdpath;
    }

    public function getAlgorithm(): ?BoxEncryptionAlgorithm
    {
        return $this->_algorithm;
    }

    public function getSecretLifetime(): ?int
    {
        return $this->_secretLifetime;
    }

    /**
     * @return self
     */
    public function setHandle(int $handle): self
    {
        $this->_handle = $handle;
        return $this;
    }

    /**
     * By default, Everscale HD path is used.
     * @return self
     */
    public function setHdpath(?string $hdpath): self
    {
        $this->_hdpath = $hdpath;
        return $this;
    }

    /**
     * @return self
     */
    public function setAlgorithm(?BoxEncryptionAlgorithm $algorithm): self
    {
        $this->_algorithm = $algorithm;
        return $this;
    }

    /**
     * @return self
     */
    public function setSecretLifetime(?int $secretLifetime): self
    {
        $this->_secretLifetime = $secretLifetime;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_handle !== null) $result['handle'] = $this->_handle;
        if ($this->_hdpath !== null) $result['hdpath'] = $this->_hdpath;
        if ($this->_algorithm !== null) $result['algorithm'] = $this->_algorithm;
        if ($this->_secretLifetime !== null) $result['secret_lifetime'] = $this->_secretLifetime;
        return !empty($result) ? $result : new stdClass();
    }
}
