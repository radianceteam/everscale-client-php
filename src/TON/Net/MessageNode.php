<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use TON\Abi\DecodedMessageBody;
use stdClass;

class MessageNode implements JsonSerializable
{
    private string $_id;

    /** This field is missing for an external inbound messages. */
    private ?string $_srcTransactionId;

    /** This field is missing for an external outbound messages. */
    private ?string $_dstTransactionId;
    private ?string $_src;
    private ?string $_dst;
    private ?string $_value;
    private bool $_bounce;

    /**
     * Library tries to decode message body using provided `params.abi_registry`.
     * This field will be missing if none of the provided abi can be used to decode.
     */
    private ?DecodedMessageBody $_decodedBody;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_id = $dto['id'] ?? '';
        $this->_srcTransactionId = $dto['src_transaction_id'] ?? null;
        $this->_dstTransactionId = $dto['dst_transaction_id'] ?? null;
        $this->_src = $dto['src'] ?? null;
        $this->_dst = $dto['dst'] ?? null;
        $this->_value = $dto['value'] ?? null;
        $this->_bounce = $dto['bounce'] ?? false;
        $this->_decodedBody = isset($dto['decoded_body']) ? new DecodedMessageBody($dto['decoded_body']) : null;
    }

    public function getId(): string
    {
        return $this->_id;
    }

    /**
     * This field is missing for an external inbound messages.
     */
    public function getSrcTransactionId(): ?string
    {
        return $this->_srcTransactionId;
    }

    /**
     * This field is missing for an external outbound messages.
     */
    public function getDstTransactionId(): ?string
    {
        return $this->_dstTransactionId;
    }

    public function getSrc(): ?string
    {
        return $this->_src;
    }

    public function getDst(): ?string
    {
        return $this->_dst;
    }

    public function getValue(): ?string
    {
        return $this->_value;
    }

    public function isBounce(): bool
    {
        return $this->_bounce;
    }

    /**
     * Library tries to decode message body using provided `params.abi_registry`.
     * This field will be missing if none of the provided abi can be used to decode.
     */
    public function getDecodedBody(): ?DecodedMessageBody
    {
        return $this->_decodedBody;
    }

    /**
     * @return self
     */
    public function setId(string $id): self
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * This field is missing for an external inbound messages.
     * @return self
     */
    public function setSrcTransactionId(?string $srcTransactionId): self
    {
        $this->_srcTransactionId = $srcTransactionId;
        return $this;
    }

    /**
     * This field is missing for an external outbound messages.
     * @return self
     */
    public function setDstTransactionId(?string $dstTransactionId): self
    {
        $this->_dstTransactionId = $dstTransactionId;
        return $this;
    }

    /**
     * @return self
     */
    public function setSrc(?string $src): self
    {
        $this->_src = $src;
        return $this;
    }

    /**
     * @return self
     */
    public function setDst(?string $dst): self
    {
        $this->_dst = $dst;
        return $this;
    }

    /**
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * @return self
     */
    public function setBounce(bool $bounce): self
    {
        $this->_bounce = $bounce;
        return $this;
    }

    /**
     * Library tries to decode message body using provided `params.abi_registry`.
     * This field will be missing if none of the provided abi can be used to decode.
     * @return self
     */
    public function setDecodedBody(?DecodedMessageBody $decodedBody): self
    {
        $this->_decodedBody = $decodedBody;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_id !== null) $result['id'] = $this->_id;
        if ($this->_srcTransactionId !== null) $result['src_transaction_id'] = $this->_srcTransactionId;
        if ($this->_dstTransactionId !== null) $result['dst_transaction_id'] = $this->_dstTransactionId;
        if ($this->_src !== null) $result['src'] = $this->_src;
        if ($this->_dst !== null) $result['dst'] = $this->_dst;
        if ($this->_value !== null) $result['value'] = $this->_value;
        if ($this->_bounce !== null) $result['bounce'] = $this->_bounce;
        if ($this->_decodedBody !== null) $result['decoded_body'] = $this->_decodedBody;
        return !empty($result) ? $result : new stdClass();
    }
}
