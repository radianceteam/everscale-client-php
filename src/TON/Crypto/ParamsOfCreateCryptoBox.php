<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfCreateCryptoBox implements JsonSerializable
{
    private string $_secretEncryptionSalt;
    private ?CryptoBoxSecret $_secret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_secretEncryptionSalt = $dto['secret_encryption_salt'] ?? '';
        $this->_secret = isset($dto['secret']) ? CryptoBoxSecret::create($dto['secret']) : null;
    }

    public function getSecretEncryptionSalt(): string
    {
        return $this->_secretEncryptionSalt;
    }

    public function getSecret(): ?CryptoBoxSecret
    {
        return $this->_secret;
    }

    /**
     * @return self
     */
    public function setSecretEncryptionSalt(string $secretEncryptionSalt): self
    {
        $this->_secretEncryptionSalt = $secretEncryptionSalt;
        return $this;
    }

    /**
     * @return self
     */
    public function setSecret(?CryptoBoxSecret $secret): self
    {
        $this->_secret = $secret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_secretEncryptionSalt !== null) $result['secret_encryption_salt'] = $this->_secretEncryptionSalt;
        if ($this->_secret !== null) $result['secret'] = $this->_secret;
        return !empty($result) ? $result : new stdClass();
    }
}
