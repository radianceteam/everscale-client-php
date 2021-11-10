<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class ProofsConfig implements JsonSerializable
{
    /**
     * Default is `true`. If this value is set to `true`, downloaded proofs and master-chain BOCs are saved into the
     * persistent local storage (e.g. file system for native environments or browser's IndexedDB
     * for the web); otherwise all the data is cached only in memory in current client's context
     * and will be lost after destruction of the client.
     */
    private ?bool $_cacheInLocalStorage;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_cacheInLocalStorage = $dto['cache_in_local_storage'] ?? null;
    }

    /**
     * Default is `true`. If this value is set to `true`, downloaded proofs and master-chain BOCs are saved into the
     * persistent local storage (e.g. file system for native environments or browser's IndexedDB
     * for the web); otherwise all the data is cached only in memory in current client's context
     * and will be lost after destruction of the client.
     */
    public function isCacheInLocalStorage(): ?bool
    {
        return $this->_cacheInLocalStorage;
    }

    /**
     * Default is `true`. If this value is set to `true`, downloaded proofs and master-chain BOCs are saved into the
     * persistent local storage (e.g. file system for native environments or browser's IndexedDB
     * for the web); otherwise all the data is cached only in memory in current client's context
     * and will be lost after destruction of the client.
     * @return self
     */
    public function setCacheInLocalStorage(?bool $cacheInLocalStorage): self
    {
        $this->_cacheInLocalStorage = $cacheInLocalStorage;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_cacheInLocalStorage !== null) $result['cache_in_local_storage'] = $this->_cacheInLocalStorage;
        return !empty($result) ? $result : new stdClass();
    }
}
