<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfQueryOperation_QueryCounterparties extends ParamsOfQueryOperation implements JsonSerializable
{
    private string $_account;
    private string $_result;
    private ?int $_first;
    private ?string $_after;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_account = $dto['account'] ?? '';
        $this->_result = $dto['result'] ?? '';
        $this->_first = $dto['first'] ?? null;
        $this->_after = $dto['after'] ?? null;
    }

    public function getAccount(): string
    {
        return $this->_account;
    }

    public function getResult(): string
    {
        return $this->_result;
    }

    public function getFirst(): ?int
    {
        return $this->_first;
    }

    public function getAfter(): ?string
    {
        return $this->_after;
    }

    /**
     * @return self
     */
    public function setAccount(string $account): self
    {
        $this->_account = $account;
        return $this;
    }

    /**
     * @return self
     */
    public function setResult(string $result): self
    {
        $this->_result = $result;
        return $this;
    }

    /**
     * @return self
     */
    public function setFirst(?int $first): self
    {
        $this->_first = $first;
        return $this;
    }

    /**
     * @return self
     */
    public function setAfter(?string $after): self
    {
        $this->_after = $after;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'QueryCounterparties'];
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_result !== null) $result['result'] = $this->_result;
        if ($this->_first !== null) $result['first'] = $this->_first;
        if ($this->_after !== null) $result['after'] = $this->_after;
        return !empty($result) ? $result : new stdClass();
    }
}
