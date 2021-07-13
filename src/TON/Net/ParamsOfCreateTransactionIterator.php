<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfCreateTransactionIterator implements JsonSerializable
{
    /**
     * If the application specifies this parameter then the iteration
     * includes blocks with `gen_utime` >= `start_time`.
     * Otherwise the iteration starts from zero state.
     *
     * Must be specified in seconds.
     */
    private ?int $_startTime;

    /**
     * If the application specifies this parameter then the iteration
     * includes blocks with `gen_utime` < `end_time`.
     * Otherwise the iteration never stops.
     *
     * Must be specified in seconds.
     */
    private ?int $_endTime;

    /**
     * If the application specifies this parameter and it is not an empty array
     * then the iteration will include items related to accounts that belongs to
     * the specified shard prefixes.
     * Shard prefix must be represented as a string "workchain:prefix".
     * Where `workchain` is a signed integer and the `prefix` if a hexadecimal
     * representation if the 64-bit unsigned integer with tagged shard prefix.
     * For example: "0:3800000000000000".
     * Account address conforms to the shard filter if
     * it belongs to the filter workchain and the first bits of address match to
     * the shard prefix. Only transactions with suitable account addresses are iterated.
     */
    private ?array $_shardFilter;

    /**
     * Application can specify the list of accounts for which
     * it wants to iterate transactions.
     *
     * If this parameter is missing or an empty list then the library iterates
     * transactions for all accounts that pass the shard filter.
     *
     * Note that the library doesn't detect conflicts between the account filter and the shard filter
     * if both are specified.
     * So it is an application responsibility to specify the correct filter combination.
     */
    private ?array $_accountsFilter;

    /**
     * List of the fields that must be returned for iterated items.
     * This field is the same as the `result` parameter of
     * the `query_collection` function.
     * Note that iterated items can contain additional fields that are
     * not requested in the `result`.
     */
    private ?string $_result;

    /**
     * If this parameter is `true` then each transaction contains field
     * `transfers` with list of transfer. See more about this structure in function description.
     */
    private ?bool $_includeTransfers;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_startTime = $dto['start_time'] ?? null;
        $this->_endTime = $dto['end_time'] ?? null;
        $this->_shardFilter = $dto['shard_filter'] ?? null;
        $this->_accountsFilter = $dto['accounts_filter'] ?? null;
        $this->_result = $dto['result'] ?? null;
        $this->_includeTransfers = $dto['include_transfers'] ?? null;
    }

    /**
     * If the application specifies this parameter then the iteration
     * includes blocks with `gen_utime` >= `start_time`.
     * Otherwise the iteration starts from zero state.
     *
     * Must be specified in seconds.
     */
    public function getStartTime(): ?int
    {
        return $this->_startTime;
    }

    /**
     * If the application specifies this parameter then the iteration
     * includes blocks with `gen_utime` < `end_time`.
     * Otherwise the iteration never stops.
     *
     * Must be specified in seconds.
     */
    public function getEndTime(): ?int
    {
        return $this->_endTime;
    }

    /**
     * If the application specifies this parameter and it is not an empty array
     * then the iteration will include items related to accounts that belongs to
     * the specified shard prefixes.
     * Shard prefix must be represented as a string "workchain:prefix".
     * Where `workchain` is a signed integer and the `prefix` if a hexadecimal
     * representation if the 64-bit unsigned integer with tagged shard prefix.
     * For example: "0:3800000000000000".
     * Account address conforms to the shard filter if
     * it belongs to the filter workchain and the first bits of address match to
     * the shard prefix. Only transactions with suitable account addresses are iterated.
     */
    public function getShardFilter(): ?array
    {
        return $this->_shardFilter;
    }

    /**
     * Application can specify the list of accounts for which
     * it wants to iterate transactions.
     *
     * If this parameter is missing or an empty list then the library iterates
     * transactions for all accounts that pass the shard filter.
     *
     * Note that the library doesn't detect conflicts between the account filter and the shard filter
     * if both are specified.
     * So it is an application responsibility to specify the correct filter combination.
     */
    public function getAccountsFilter(): ?array
    {
        return $this->_accountsFilter;
    }

    /**
     * List of the fields that must be returned for iterated items.
     * This field is the same as the `result` parameter of
     * the `query_collection` function.
     * Note that iterated items can contain additional fields that are
     * not requested in the `result`.
     */
    public function getResult(): ?string
    {
        return $this->_result;
    }

    /**
     * If this parameter is `true` then each transaction contains field
     * `transfers` with list of transfer. See more about this structure in function description.
     */
    public function isIncludeTransfers(): ?bool
    {
        return $this->_includeTransfers;
    }

    /**
     * If the application specifies this parameter then the iteration
     * includes blocks with `gen_utime` >= `start_time`.
     * Otherwise the iteration starts from zero state.
     *
     * Must be specified in seconds.
     * @return self
     */
    public function setStartTime(?int $startTime): self
    {
        $this->_startTime = $startTime;
        return $this;
    }

    /**
     * If the application specifies this parameter then the iteration
     * includes blocks with `gen_utime` < `end_time`.
     * Otherwise the iteration never stops.
     *
     * Must be specified in seconds.
     * @return self
     */
    public function setEndTime(?int $endTime): self
    {
        $this->_endTime = $endTime;
        return $this;
    }

    /**
     * If the application specifies this parameter and it is not an empty array
     * then the iteration will include items related to accounts that belongs to
     * the specified shard prefixes.
     * Shard prefix must be represented as a string "workchain:prefix".
     * Where `workchain` is a signed integer and the `prefix` if a hexadecimal
     * representation if the 64-bit unsigned integer with tagged shard prefix.
     * For example: "0:3800000000000000".
     * Account address conforms to the shard filter if
     * it belongs to the filter workchain and the first bits of address match to
     * the shard prefix. Only transactions with suitable account addresses are iterated.
     * @return self
     */
    public function setShardFilter(?array $shardFilter): self
    {
        $this->_shardFilter = $shardFilter;
        return $this;
    }

    /**
     * Application can specify the list of accounts for which
     * it wants to iterate transactions.
     *
     * If this parameter is missing or an empty list then the library iterates
     * transactions for all accounts that pass the shard filter.
     *
     * Note that the library doesn't detect conflicts between the account filter and the shard filter
     * if both are specified.
     * So it is an application responsibility to specify the correct filter combination.
     * @return self
     */
    public function setAccountsFilter(?array $accountsFilter): self
    {
        $this->_accountsFilter = $accountsFilter;
        return $this;
    }

    /**
     * List of the fields that must be returned for iterated items.
     * This field is the same as the `result` parameter of
     * the `query_collection` function.
     * Note that iterated items can contain additional fields that are
     * not requested in the `result`.
     * @return self
     */
    public function setResult(?string $result): self
    {
        $this->_result = $result;
        return $this;
    }

    /**
     * If this parameter is `true` then each transaction contains field
     * `transfers` with list of transfer. See more about this structure in function description.
     * @return self
     */
    public function setIncludeTransfers(?bool $includeTransfers): self
    {
        $this->_includeTransfers = $includeTransfers;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_startTime !== null) $result['start_time'] = $this->_startTime;
        if ($this->_endTime !== null) $result['end_time'] = $this->_endTime;
        if ($this->_shardFilter !== null) $result['shard_filter'] = $this->_shardFilter;
        if ($this->_accountsFilter !== null) $result['accounts_filter'] = $this->_accountsFilter;
        if ($this->_result !== null) $result['result'] = $this->_result;
        if ($this->_includeTransfers !== null) $result['include_transfers'] = $this->_includeTransfers;
        return !empty($result) ? $result : new stdClass();
    }
}
