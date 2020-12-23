<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use stdClass;

class AccountForExecutor_Account extends AccountForExecutor implements JsonSerializable
{
    /** Encoded as base64. */
    private string $_boc;

    /** Can be used to calculatetransaction fees without balance check */
    private ?bool $_unlimitedBalance;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_boc = $dto['boc'] ?? '';
        $this->_unlimitedBalance = $dto['unlimited_balance'] ?? null;
    }

    /**
     * Encoded as base64.
     */
    public function getBoc(): string
    {
        return $this->_boc;
    }

    /**
     * Can be used to calculatetransaction fees without balance check
     */
    public function isUnlimitedBalance(): ?bool
    {
        return $this->_unlimitedBalance;
    }

    /**
     * Encoded as base64.
     */
    public function setBoc(string $boc): self
    {
        $this->_boc = $boc;
        return $this;
    }

    /**
     * Can be used to calculatetransaction fees without balance check
     */
    public function setUnlimitedBalance(?bool $unlimitedBalance): self
    {
        $this->_unlimitedBalance = $unlimitedBalance;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Account'];
        if ($this->_boc !== null) $result['boc'] = $this->_boc;
        if ($this->_unlimitedBalance !== null) $result['unlimited_balance'] = $this->_unlimitedBalance;
        return !empty($result) ? $result : new stdClass();
    }
}
