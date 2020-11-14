<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ResultOfEncodeMessageBody implements JsonSerializable
{
    /** Message body BOC encoded with `base64`. */
    private string $_body;

    /**
     * Optional data to sign. Encoded with `base64`.
     *
     *  Presents when `message` is unsigned. Can be used for external
     *  message signing. Is this case you need to sing this data and
     *  produce signed message using `abi.attach_signature`.
     */
    private ?string $_dataToSign;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_body = $dto['body'] ?? '';
        $this->_dataToSign = $dto['data_to_sign'] ?? null;
    }

    /**
     * Message body BOC encoded with `base64`.
     */
    public function getBody(): string
    {
        return $this->_body;
    }

    /**
     * Optional data to sign. Encoded with `base64`.
     *
     *  Presents when `message` is unsigned. Can be used for external
     *  message signing. Is this case you need to sing this data and
     *  produce signed message using `abi.attach_signature`.
     */
    public function getDataToSign(): ?string
    {
        return $this->_dataToSign;
    }

    /**
     * Message body BOC encoded with `base64`.
     */
    public function setBody(string $body): self
    {
        $this->_body = $body;
        return $this;
    }

    /**
     * Optional data to sign. Encoded with `base64`.
     *
     *  Presents when `message` is unsigned. Can be used for external
     *  message signing. Is this case you need to sing this data and
     *  produce signed message using `abi.attach_signature`.
     */
    public function setDataToSign(?string $dataToSign): self
    {
        $this->_dataToSign = $dataToSign;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_body !== null) $result['body'] = $this->_body;
        if ($this->_dataToSign !== null) $result['data_to_sign'] = $this->_dataToSign;
        return $result;
    }
}
