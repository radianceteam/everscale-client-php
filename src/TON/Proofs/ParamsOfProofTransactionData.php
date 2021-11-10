<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Proofs;

use JsonSerializable;
use stdClass;

class ParamsOfProofTransactionData implements JsonSerializable
{
    private $_transaction;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_transaction = $dto['transaction'] ?? null;
    }

    public function getTransaction()
    {
        return $this->_transaction;
    }

    /**
     * @return self
     */
    public function setTransaction($transaction): self
    {
        $this->_transaction = $transaction;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_transaction !== null) $result['transaction'] = $this->_transaction;
        return !empty($result) ? $result : new stdClass();
    }
}
