<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ResultOfEncodeMessage implements JsonSerializable
{
    /** Message BOC encoded with `base64`. */
    private string $_message;

    /**
     * Optional data to be signed encoded in `base64`.
     *
     *  Returned in case of `Signer::External`. Can be used for external
     *  message signing. Is this case you need to use this data to create signature and
     *  then produce signed message using `abi.attach_signature`.
     */
    private string $_dataToSign;

    /** Destination address. */
    private string $_address;

    /** Message id. */
    private string $_messageId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_message = $dto['message'];
        $this->_dataToSign = $dto['data_to_sign'];
        $this->_address = $dto['address'];
        $this->_messageId = $dto['message_id'];
    }

    /**
     * Message BOC encoded with `base64`.
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Optional data to be signed encoded in `base64`.
     *
     *  Returned in case of `Signer::External`. Can be used for external
     *  message signing. Is this case you need to use this data to create signature and
     *  then produce signed message using `abi.attach_signature`.
     */
    public function getDataToSign(): ?string
    {
        return $this->_dataToSign;
    }

    /**
     * Destination address.
     */
    public function getAddress(): string
    {
        return $this->_address;
    }

    /**
     * Message id.
     */
    public function getMessageId(): string
    {
        return $this->_messageId;
    }

    /**
     * Message BOC encoded with `base64`.
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * Optional data to be signed encoded in `base64`.
     *
     *  Returned in case of `Signer::External`. Can be used for external
     *  message signing. Is this case you need to use this data to create signature and
     *  then produce signed message using `abi.attach_signature`.
     */
    public function setDataToSign(?string $dataToSign): self
    {
        $this->_dataToSign = $dataToSign;
        return $this;
    }

    /**
     * Destination address.
     */
    public function setAddress(string $address): self
    {
        $this->_address = $address;
        return $this;
    }

    /**
     * Message id.
     */
    public function setMessageId(string $messageId): self
    {
        $this->_messageId = $messageId;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_dataToSign !== null) $result['data_to_sign'] = $this->_dataToSign;
        if ($this->_address !== null) $result['address'] = $this->_address;
        if ($this->_messageId !== null) $result['message_id'] = $this->_messageId;
        return $result;
    }
}
