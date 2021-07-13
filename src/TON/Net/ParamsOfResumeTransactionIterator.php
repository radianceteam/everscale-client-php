<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfResumeTransactionIterator implements JsonSerializable
{
    /** Same as value returned from `iterator_next`. */
    private $_resumeState;

    /**
     * Application can specify the list of accounts for which
     * it wants to iterate transactions.
     *
     * If this parameter is missing or an empty list then the library iterates
     * transactions for all accounts that passes the shard filter.
     *
     * Note that the library doesn't detect conflicts between the account filter and the shard filter
     * if both are specified.
     * So it is the application's responsibility to specify the correct filter combination.
     */
    private ?array $_accountsFilter;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_resumeState = $dto['resume_state'] ?? null;
        $this->_accountsFilter = $dto['accounts_filter'] ?? null;
    }

    /**
     * Same as value returned from `iterator_next`.
     */
    public function getResumeState()
    {
        return $this->_resumeState;
    }

    /**
     * Application can specify the list of accounts for which
     * it wants to iterate transactions.
     *
     * If this parameter is missing or an empty list then the library iterates
     * transactions for all accounts that passes the shard filter.
     *
     * Note that the library doesn't detect conflicts between the account filter and the shard filter
     * if both are specified.
     * So it is the application's responsibility to specify the correct filter combination.
     */
    public function getAccountsFilter(): ?array
    {
        return $this->_accountsFilter;
    }

    /**
     * Same as value returned from `iterator_next`.
     * @return self
     */
    public function setResumeState($resumeState): self
    {
        $this->_resumeState = $resumeState;
        return $this;
    }

    /**
     * Application can specify the list of accounts for which
     * it wants to iterate transactions.
     *
     * If this parameter is missing or an empty list then the library iterates
     * transactions for all accounts that passes the shard filter.
     *
     * Note that the library doesn't detect conflicts between the account filter and the shard filter
     * if both are specified.
     * So it is the application's responsibility to specify the correct filter combination.
     * @return self
     */
    public function setAccountsFilter(?array $accountsFilter): self
    {
        $this->_accountsFilter = $accountsFilter;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_resumeState !== null) $result['resume_state'] = $this->_resumeState;
        if ($this->_accountsFilter !== null) $result['accounts_filter'] = $this->_accountsFilter;
        return !empty($result) ? $result : new stdClass();
    }
}
