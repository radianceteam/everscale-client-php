<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfBocCacheSet implements JsonSerializable
{
    private string $_boc;
    private ?BocCacheType $_cacheType;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_boc = $dto['boc'] ?? '';
        $this->_cacheType = isset($dto['cache_type']) ? BocCacheType::create($dto['cache_type']) : null;
    }

    public function getBoc(): string
    {
        return $this->_boc;
    }

    public function getCacheType(): ?BocCacheType
    {
        return $this->_cacheType;
    }

    /**
     * @return self
     */
    public function setBoc(string $boc): self
    {
        $this->_boc = $boc;
        return $this;
    }

    /**
     * @return self
     */
    public function setCacheType(?BocCacheType $cacheType): self
    {
        $this->_cacheType = $cacheType;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_boc !== null) $result['boc'] = $this->_boc;
        if ($this->_cacheType !== null) $result['cache_type'] = $this->_cacheType;
        return !empty($result) ? $result : new stdClass();
    }
}
