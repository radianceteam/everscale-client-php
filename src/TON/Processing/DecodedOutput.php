<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use stdClass;

class DecodedOutput implements JsonSerializable
{
    /**
     * If the message can't be decoded, then `None` will be stored in
     * the appropriate position.
     */
    private array $_outMessages;
    private $_output;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_outMessages = $dto['out_messages'] ?? [];
        $this->_output = $dto['output'] ?? null;
    }

    /**
     * If the message can't be decoded, then `None` will be stored in
     * the appropriate position.
     */
    public function getOutMessages(): array
    {
        return $this->_outMessages;
    }

    public function getOutput()
    {
        return $this->_output;
    }

    /**
     * If the message can't be decoded, then `None` will be stored in
     * the appropriate position.
     * @return self
     */
    public function setOutMessages(array $outMessages): self
    {
        $this->_outMessages = $outMessages;
        return $this;
    }

    /**
     * @return self
     */
    public function setOutput($output): self
    {
        $this->_output = $output;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_outMessages !== null) $result['out_messages'] = $this->_outMessages;
        if ($this->_output !== null) $result['output'] = $this->_output;
        return !empty($result) ? $result : new stdClass();
    }
}
