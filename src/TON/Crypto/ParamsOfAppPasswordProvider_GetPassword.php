<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfAppPasswordProvider_GetPassword extends ParamsOfAppPasswordProvider implements JsonSerializable
{
    private string $_encryptionPublicKey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encryptionPublicKey = $dto['encryption_public_key'] ?? '';
    }

    public function getEncryptionPublicKey(): string
    {
        return $this->_encryptionPublicKey;
    }

    /**
     * @return self
     */
    public function setEncryptionPublicKey(string $encryptionPublicKey): self
    {
        $this->_encryptionPublicKey = $encryptionPublicKey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'GetPassword'];
        if ($this->_encryptionPublicKey !== null) $result['encryption_public_key'] = $this->_encryptionPublicKey;
        return !empty($result) ? $result : new stdClass();
    }
}
