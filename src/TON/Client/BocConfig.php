<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class BocConfig implements JsonSerializable
{
    /** Default is 10 MB */
    private ?int $_cacheMaxSize;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_cacheMaxSize = $dto['cache_max_size'] ?? null;
    }

    /**
     * Default is 10 MB
     */
    public function getCacheMaxSize(): ?int
    {
        return $this->_cacheMaxSize;
    }

    /**
     * Default is 10 MB
     * @return self
     */
    public function setCacheMaxSize(?int $cacheMaxSize): self
    {
        $this->_cacheMaxSize = $cacheMaxSize;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_cacheMaxSize !== null) $result['cache_max_size'] = $this->_cacheMaxSize;
        return !empty($result) ? $result : new stdClass();
    }
}
