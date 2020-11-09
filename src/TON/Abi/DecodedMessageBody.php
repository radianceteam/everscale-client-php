<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class DecodedMessageBody implements JsonSerializable
{
    /** Type of the message body content. */
    private MessageBodyType $_bodyType;

    /** Function or event name. */
    private string $_name;

    /** Parameters or result value. */
    private $_value;

    /** Function header. */
    private FunctionHeader $_header;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_bodyType = new MessageBodyType($dto['body_type']);
        $this->_name = $dto['name'];
        $this->_value = $dto['value'];
        $this->_header = new FunctionHeader($dto['header']);
    }

    /**
     * Type of the message body content.
     */
    public function getBodyType(): MessageBodyType
    {
        return $this->_bodyType;
    }

    /**
     * Function or event name.
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * Parameters or result value.
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Function header.
     */
    public function getHeader(): ?FunctionHeader
    {
        return $this->_header;
    }

    /**
     * Type of the message body content.
     */
    public function setBodyType(MessageBodyType $bodyType): self
    {
        $this->_bodyType = $bodyType;
        return $this;
    }

    /**
     * Function or event name.
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * Parameters or result value.
     */
    public function setValue($value): self
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * Function header.
     */
    public function setHeader(?FunctionHeader $header): self
    {
        $this->_header = $header;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_bodyType !== null) $result['body_type'] = $this->_bodyType;
        if ($this->_name !== null) $result['name'] = $this->_name;
        if ($this->_value !== null) $result['value'] = $this->_value;
        if ($this->_header !== null) $result['header'] = $this->_header;
        return $result;
    }
}
