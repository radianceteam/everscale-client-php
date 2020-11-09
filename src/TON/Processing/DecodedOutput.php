<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;

class DecodedOutput implements JsonSerializable
{
    /**
     * Decoded bodies of the out messages.
     *
     *  If the message can't be decoded, then `None` will be stored in
     *  the appropriate position.
     */
    private array $_outMessages;

    /** Decoded body of the function output message. */
    private $_output;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_outMessages = $dto['out_messages'];
        $this->_output = new ($dto['output']);
    }

    /**
     * Decoded bodies of the out messages.
     *
     *  If the message can't be decoded, then `None` will be stored in
     *  the appropriate position.
     */
    public function getOutMessages(): array
    {
        return $this->_outMessages;
    }

    /**
     * Decoded body of the function output message.
     */
    public function getOutput()
    {
        return $this->_output;
    }

    /**
     * Decoded bodies of the out messages.
     *
     *  If the message can't be decoded, then `None` will be stored in
     *  the appropriate position.
     */
    public function setOutMessages(array $outMessages): self
    {
        $this->_outMessages = $outMessages;
        return $this;
    }

    /**
     * Decoded body of the function output message.
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
        return $result;
    }
}
