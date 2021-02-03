<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfEncodeMessage implements JsonSerializable
{
    private string $_message;

    /**
     * Returned in case of `Signer::External`. Can be used for external
     * message signing. Is this case you need to use this data to create signature and
     * then produce signed message using `abi.attach_signature`.
     */
    private ?string $_dataToSign;
    private string $_address;
    private string $_messageId;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_dataToSign = $dto['data_to_sign'] ?? null;
        $this->_address = $dto['address'] ?? '';
        $this->_messageId = $dto['message_id'] ?? '';
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Returned in case of `Signer::External`. Can be used for external
     * message signing. Is this case you need to use this data to create signature and
     * then produce signed message using `abi.attach_signature`.
     */
    public function getDataToSign(): ?string
    {
        return $this->_dataToSign;
    }

    public function getAddress(): string
    {
        return $this->_address;
    }

    public function getMessageId(): string
    {
        return $this->_messageId;
    }

    /**
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * Returned in case of `Signer::External`. Can be used for external
     * message signing. Is this case you need to use this data to create signature and
     * then produce signed message using `abi.attach_signature`.
     * @return self
     */
    public function setDataToSign(?string $dataToSign): self
    {
        $this->_dataToSign = $dataToSign;
        return $this;
    }

    /**
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->_address = $address;
        return $this;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
