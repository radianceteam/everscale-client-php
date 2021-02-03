<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use JsonSerializable;
use TON\Tvm\TransactionFees;
use stdClass;

class ResultOfProcessMessage implements JsonSerializable
{
    /**
     * In addition to the regular transaction fields there is a
     * `boc` field encoded with `base64` which contains source
     * transaction BOC.
     */
    private $_transaction;

    /** Encoded as `base64` */
    private array $_outMessages;
    private ?DecodedOutput $_decoded;
    private ?TransactionFees $_fees;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_transaction = $dto['transaction'] ?? null;
        $this->_outMessages = $dto['out_messages'] ?? [];
        $this->_decoded = isset($dto['decoded']) ? new DecodedOutput($dto['decoded']) : null;
        $this->_fees = isset($dto['fees']) ? new TransactionFees($dto['fees']) : null;
    }

    /**
     * In addition to the regular transaction fields there is a
     * `boc` field encoded with `base64` which contains source
     * transaction BOC.
     */
    public function getTransaction()
    {
        return $this->_transaction;
    }

    /**
     * Encoded as `base64`
     */
    public function getOutMessages(): array
    {
        return $this->_outMessages;
    }

    public function getDecoded(): ?DecodedOutput
    {
        return $this->_decoded;
    }

    public function getFees(): ?TransactionFees
    {
        return $this->_fees;
    }

    /**
     * In addition to the regular transaction fields there is a
     * `boc` field encoded with `base64` which contains source
     * transaction BOC.
     * @return self
     */
    public function setTransaction($transaction): self
    {
        $this->_transaction = $transaction;
        return $this;
    }

    /**
     * Encoded as `base64`
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
    public function setDecoded(?DecodedOutput $decoded): self
    {
        $this->_decoded = $decoded;
        return $this;
    }

    /**
     * @return self
     */
    public function setFees(?TransactionFees $fees): self
    {
        $this->_fees = $fees;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_transaction !== null) $result['transaction'] = $this->_transaction;
        if ($this->_outMessages !== null) $result['out_messages'] = $this->_outMessages;
        if ($this->_decoded !== null) $result['decoded'] = $this->_decoded;
        if ($this->_fees !== null) $result['fees'] = $this->_fees;
        return !empty($result) ? $result : new stdClass();
    }
}
