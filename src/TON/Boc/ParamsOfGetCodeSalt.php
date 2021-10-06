<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfGetCodeSalt implements JsonSerializable
{
    private string $_code;
    private ?BocCacheType $_bocCache;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_code = $dto['code'] ?? '';
        $this->_bocCache = isset($dto['boc_cache']) ? BocCacheType::create($dto['boc_cache']) : null;
    }

    public function getCode(): string
    {
        return $this->_code;
    }

    public function getBocCache(): ?BocCacheType
    {
        return $this->_bocCache;
    }

    /**
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->_code = $code;
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
        if ($this->_code !== null) $result['code'] = $this->_code;
        if ($this->_bocCache !== null) $result['boc_cache'] = $this->_bocCache;
        return !empty($result) ? $result : new stdClass();
    }
}
