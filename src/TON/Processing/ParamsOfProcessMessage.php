<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use TON\Abi\ParamsOfEncodeMessage;
use stdClass;

class ParamsOfProcessMessage implements JsonSerializable
{
    private ?ParamsOfEncodeMessage $_messageEncodeParams;
    private bool $_sendEvents;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_messageEncodeParams = isset($dto['message_encode_params']) ? new ParamsOfEncodeMessage($dto['message_encode_params']) : null;
        $this->_sendEvents = $dto['send_events'] ?? false;
    }

    public function getMessageEncodeParams(): ?ParamsOfEncodeMessage
    {
        return $this->_messageEncodeParams;
    }

    public function isSendEvents(): bool
    {
        return $this->_sendEvents;
    }

    public function setMessageEncodeParams(?ParamsOfEncodeMessage $messageEncodeParams): self
    {
        $this->_messageEncodeParams = $messageEncodeParams;
        return $this;
    }

    public function setSendEvents(bool $sendEvents): self
    {
        $this->_sendEvents = $sendEvents;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_messageEncodeParams !== null) $result['message_encode_params'] = $this->_messageEncodeParams;
        if ($this->_sendEvents !== null) $result['send_events'] = $this->_sendEvents;
        return !empty($result) ? $result : new stdClass();
    }
}
