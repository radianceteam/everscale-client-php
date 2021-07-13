<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfCreateBlockIterator implements JsonSerializable
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
     * If the application specifies this parameter and it is not the empty array
     * then the iteration will include items related to accounts that belongs to
     * the specified shard prefixes.
     * Shard prefix must be represented as a string "workchain:prefix".
     * Where `workchain` is a signed integer and the `prefix` if a hexadecimal
     * representation if the 64-bit unsigned integer with tagged shard prefix.
     * For example: "0:3800000000000000".
     */
    private ?array $_shardFilter;

    /**
     * List of the fields that must be returned for iterated items.
     * This field is the same as the `result` parameter of
     * the `query_collection` function.
     * Note that iterated items can contains additional fields that are
     * not requested in the `result`.
     */
    private ?string $_result;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_startTime = $dto['start_time'] ?? null;
        $this->_endTime = $dto['end_time'] ?? null;
        $this->_shardFilter = $dto['shard_filter'] ?? null;
        $this->_result = $dto['result'] ?? null;
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
     * If the application specifies this parameter and it is not the empty array
     * then the iteration will include items related to accounts that belongs to
     * the specified shard prefixes.
     * Shard prefix must be represented as a string "workchain:prefix".
     * Where `workchain` is a signed integer and the `prefix` if a hexadecimal
     * representation if the 64-bit unsigned integer with tagged shard prefix.
     * For example: "0:3800000000000000".
     */
    public function getShardFilter(): ?array
    {
        return $this->_shardFilter;
    }

    /**
     * List of the fields that must be returned for iterated items.
     * This field is the same as the `result` parameter of
     * the `query_collection` function.
     * Note that iterated items can contains additional fields that are
     * not requested in the `result`.
     */
    public function getResult(): ?string
    {
        return $this->_result;
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
     * If the application specifies this parameter and it is not the empty array
     * then the iteration will include items related to accounts that belongs to
     * the specified shard prefixes.
     * Shard prefix must be represented as a string "workchain:prefix".
     * Where `workchain` is a signed integer and the `prefix` if a hexadecimal
     * representation if the 64-bit unsigned integer with tagged shard prefix.
     * For example: "0:3800000000000000".
     * @return self
     */
    public function setShardFilter(?array $shardFilter): self
    {
        $this->_shardFilter = $shardFilter;
        return $this;
    }

    /**
     * List of the fields that must be returned for iterated items.
     * This field is the same as the `result` parameter of
     * the `query_collection` function.
     * Note that iterated items can contains additional fields that are
     * not requested in the `result`.
     * @return self
     */
    public function setResult(?string $result): self
    {
        $this->_result = $result;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_startTime !== null) $result['start_time'] = $this->_startTime;
        if ($this->_endTime !== null) $result['end_time'] = $this->_endTime;
        if ($this->_shardFilter !== null) $result['shard_filter'] = $this->_shardFilter;
        if ($this->_result !== null) $result['result'] = $this->_result;
        return !empty($result) ? $result : new stdClass();
    }
}
