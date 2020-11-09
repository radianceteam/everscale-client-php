<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ParamsOfAttachSignatureToMessageBody implements JsonSerializable
{
    /** Contract ABI */
    private Abi $_abi;

    /** Public key. Must be encoded with `hex`. */
    private string $_publicKey;

    /** Unsigned message BOC. Must be encoded with `base64`. */
    private string $_message;

    /** Signature. Must be encoded with `hex`. */
    private string $_signature;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_abi = new Abi($dto['abi']);
        $this->_publicKey = $dto['public_key'];
        $this->_message = $dto['message'];
        $this->_signature = $dto['signature'];
    }

    /**
     * Contract ABI
     */
    public function getAbi(): Abi
    {
        return $this->_abi;
    }

    /**
     * Public key. Must be encoded with `hex`.
     */
    public function getPublicKey(): string
    {
        return $this->_publicKey;
    }

    /**
     * Unsigned message BOC. Must be encoded with `base64`.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Signature. Must be encoded with `hex`.
     */
    public function getSignature(): string
    {
        return $this->_signature;
    }

    /**
     * Contract ABI
     */
    public function setAbi(Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Public key. Must be encoded with `hex`.
     */
    public function setPublicKey(string $publicKey): self
    {
        $this->_publicKey = $publicKey;
        return $this;
    }

    /**
     * Unsigned message BOC. Must be encoded with `base64`.
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * Signature. Must be encoded with `hex`.
     */
    public function setSignature(string $signature): self
    {
        $this->_signature = $signature;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_publicKey !== null) $result['public_key'] = $this->_publicKey;
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_signature !== null) $result['signature'] = $this->_signature;
        return $result;
    }
}
