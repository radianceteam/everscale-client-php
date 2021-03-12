<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfEncodeBoc implements JsonSerializable
{
    /** @var BuilderOp[] */
    private array $_builder;
    private ?BocCacheType $_bocCache;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_builder = $dto['builder'] ?? [];
        $this->_bocCache = isset($dto['boc_cache']) ? BocCacheType::create($dto['boc_cache']) : null;
    }

    /**
     * @return BuilderOp[]
     */
    public function getBuilder(): array
    {
        return $this->_builder;
    }

    public function getBocCache(): ?BocCacheType
    {
        return $this->_bocCache;
    }

    /**
     * @param BuilderOp[] $builder
     * @return self
     */
    public function setBuilder(array $builder): self
    {
        $this->_builder = $builder;
        return $this;
    }

    /**
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
        if ($this->_builder !== null) $result['builder'] = $this->_builder;
        if ($this->_bocCache !== null) $result['boc_cache'] = $this->_bocCache;
        return !empty($result) ? $result : new stdClass();
    }
}
