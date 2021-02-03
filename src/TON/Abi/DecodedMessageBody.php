<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class DecodedMessageBody implements JsonSerializable
{
    private string $_bodyType;
    private string $_name;
    private $_value;
    private ?FunctionHeader $_header;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_bodyType = $dto['body_type'] ?? '';
        $this->_name = $dto['name'] ?? '';
        $this->_value = $dto['value'] ?? null;
        $this->_header = isset($dto['header']) ? new FunctionHeader($dto['header']) : null;
    }

    public function getBodyType(): string
    {
        return $this->_bodyType;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function getHeader(): ?FunctionHeader
    {
        return $this->_header;
    }

    /**
     * @return self
     */
    public function setBodyType(string $bodyType): self
    {
        $this->_bodyType = $bodyType;
        return $this;
    }

    /**
     * @return self
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return self
     */
    public function setValue($value): self
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
