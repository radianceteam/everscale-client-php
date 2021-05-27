<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfQueryTransactionTree implements JsonSerializable
{
    /** @var MessageNode[] */
    private array $_messages;

    /** @var TransactionNode[] */
    private array $_transactions;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_messages = isset($dto['messages']) ? array_map(function ($i) { return new MessageNode($i); }, $dto['messages']) : [];
        $this->_transactions = isset($dto['transactions']) ? array_map(function ($i) { return new TransactionNode($i); }, $dto['transactions']) : [];
    }

    /**
     * @return MessageNode[]
     */
    public function getMessages(): array
    {
        return $this->_messages;
    }

    /**
     * @return TransactionNode[]
     */
    public function getTransactions(): array
    {
        return $this->_transactions;
    }

    /**
     * @param MessageNode[] $messages
     * @return self
     */
    public function setMessages(array $messages): self
    {
        $this->_messages = $messages;
        return $this;
    }

    /**
     * @param TransactionNode[] $transactions
     * @return self
     */
    public function setTransactions(array $transactions): self
    {
        $this->_transactions = $transactions;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_messages !== null) $result['messages'] = $this->_messages;
        if ($this->_transactions !== null) $result['transactions'] = $this->_transactions;
        return !empty($result) ? $result : new stdClass();
    }
}
