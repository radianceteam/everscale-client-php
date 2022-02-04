<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use TON\Boc\BocCacheType;
use stdClass;

class ParamsOfAbiEncodeBoc implements JsonSerializable
{
    /** @var AbiParam[] */
    private array $_params;
    private $_data;

    /** The BOC itself returned if no cache type provided */
    private ?BocCacheType $_bocCache;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_params = isset($dto['params']) ? array_map(function ($i) { return new AbiParam($i); }, $dto['params']) : [];
        $this->_data = $dto['data'] ?? null;
        $this->_bocCache = isset($dto['boc_cache']) ? BocCacheType::create($dto['boc_cache']) : null;
    }

    /**
     * @return AbiParam[]
     */
    public function getParams(): array
    {
        return $this->_params;
    }

    public function getData()
    {
        return $this->_data;
    }

    /**
     * The BOC itself returned if no cache type provided
     */
    public function getBocCache(): ?BocCacheType
    {
        return $this->_bocCache;
    }

    /**
     * @param AbiParam[] $params
     * @return self
     */
    public function setParams(array $params): self
    {
        $this->_params = $params;
        return $this;
    }

    /**
     * @return self
     */
    public function setData($data): self
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * The BOC itself returned if no cache type provided
     * @return self
     */
    public function setBocCache(?BocCacheType $bocCache): self
    {
        $this->_bocCache = $bocCache;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_params !== null) $result['params'] = $this->_params;
        if ($this->_data !== null) $result['data'] = $this->_data;
        if ($this->_bocCache !== null) $result['boc_cache'] = $this->_bocCache;
        return !empty($result) ? $result : new stdClass();
    }
}
