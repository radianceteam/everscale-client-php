<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;
use stdClass;

class Account extends AccountForExecutor implements JsonSerializable
{
    /** Account BOC. Encoded as base64. */
    private string $_boc;

    /**
     * Flag for running account with the unlimited balance. Can be used to calculate
     *  transaction fees without balance check
     */
    private ?bool $_unlimitedBalance;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_boc = $dto['boc'] ?? '';
        $this->_unlimitedBalance = $dto['unlimited_balance'] ?? null;
    }

    /**
     * Account BOC. Encoded as base64.
     */
    public function getBoc(): string
    {
        return $this->_boc;
    }

    /**
     * Flag for running account with the unlimited balance. Can be used to calculate
     *  transaction fees without balance check
     */
    public function isUnlimitedBalance(): ?bool
    {
        return $this->_unlimitedBalance;
    }

    /**
     * Account BOC. Encoded as base64.
     */
    public function setBoc(string $boc): self
    {
        $this->_boc = $boc;
        return $this;
    }

    /**
     * Flag for running account with the unlimited balance. Can be used to calculate
     *  transaction fees without balance check
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
