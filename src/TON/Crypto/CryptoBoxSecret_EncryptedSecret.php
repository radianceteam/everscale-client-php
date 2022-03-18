<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class CryptoBoxSecret_EncryptedSecret extends CryptoBoxSecret implements JsonSerializable
{
    private string $_encryptedSecret;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encryptedSecret = $dto['encrypted_secret'] ?? '';
    }

    public function getEncryptedSecret(): string
    {
        return $this->_encryptedSecret;
    }

    /**
     * @return self
     */
    public function setEncryptedSecret(string $encryptedSecret): self
    {
        $this->_encryptedSecret = $encryptedSecret;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'EncryptedSecret'];
        if ($this->_encryptedSecret !== null) $result['encrypted_secret'] = $this->_encryptedSecret;
        return !empty($result) ? $result : new stdClass();
    }
}
