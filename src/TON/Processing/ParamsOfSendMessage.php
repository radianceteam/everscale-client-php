<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use TON\Abi\Abi;
use stdClass;

class ParamsOfSendMessage implements JsonSerializable
{
    private string $_message;

    /**
     * If this parameter is specified and the message has the
     * `expire` header then expiration time will be checked against
     * the current time to prevent unnecessary sending of already expired message.
     *
     * The `message already expired` error will be returned in this
     * case.
     *
     * Note, that specifying `abi` for ABI compliant contracts is
     * strongly recommended, so that proper processing strategy can be
     * chosen.
     */
    private ?Abi $_abi;
    private bool $_sendEvents;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_message = $dto['message'] ?? '';
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_sendEvents = $dto['send_events'] ?? false;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * If this parameter is specified and the message has the
     * `expire` header then expiration time will be checked against
     * the current time to prevent unnecessary sending of already expired message.
     *
     * The `message already expired` error will be returned in this
     * case.
     *
     * Note, that specifying `abi` for ABI compliant contracts is
     * strongly recommended, so that proper processing strategy can be
     * chosen.
     */
    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    public function isSendEvents(): bool
    {
        return $this->_sendEvents;
    }

    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * If this parameter is specified and the message has the
     * `expire` header then expiration time will be checked against
     * the current time to prevent unnecessary sending of already expired message.
     *
     * The `message already expired` error will be returned in this
     * case.
     *
     * Note, that specifying `abi` for ABI compliant contracts is
     * strongly recommended, so that proper processing strategy can be
     * chosen.
     */
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
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
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_sendEvents !== null) $result['send_events'] = $this->_sendEvents;
        return !empty($result) ? $result : new stdClass();
    }
}
