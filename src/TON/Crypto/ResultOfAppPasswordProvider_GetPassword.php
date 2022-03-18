<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfAppPasswordProvider_GetPassword extends ResultOfAppPasswordProvider implements JsonSerializable
{
    private string $_encryptedPassword;

    /** Used together with `encryption_public_key` to decode `encrypted_password`. */
    private string $_appEncryptionPubkey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_encryptedPassword = $dto['encrypted_password'] ?? '';
        $this->_appEncryptionPubkey = $dto['app_encryption_pubkey'] ?? '';
    }

    public function getEncryptedPassword(): string
    {
        return $this->_encryptedPassword;
    }

    /**
     * Used together with `encryption_public_key` to decode `encrypted_password`.
     */
    public function getAppEncryptionPubkey(): string
    {
        return $this->_appEncryptionPubkey;
    }

    /**
     * @return self
     */
    public function setEncryptedPassword(string $encryptedPassword): self
    {
        $this->_encryptedPassword = $encryptedPassword;
        return $this;
    }

    /**
     * Used together with `encryption_public_key` to decode `encrypted_password`.
     * @return self
     */
    public function setAppEncryptionPubkey(string $appEncryptionPubkey): self
    {
        $this->_appEncryptionPubkey = $appEncryptionPubkey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'GetPassword'];
        if ($this->_encryptedPassword !== null) $result['encrypted_password'] = $this->_encryptedPassword;
        if ($this->_appEncryptionPubkey !== null) $result['app_encryption_pubkey'] = $this->_appEncryptionPubkey;
        return !empty($result) ? $result : new stdClass();
    }
}
