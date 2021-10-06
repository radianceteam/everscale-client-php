<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfDecodeTvc implements JsonSerializable
{
    private string $_tvc;
    private ?BocCacheType $_bocCache;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_tvc = $dto['tvc'] ?? '';
        $this->_bocCache = isset($dto['boc_cache']) ? BocCacheType::create($dto['boc_cache']) : null;
    }

    public function getTvc(): string
    {
        return $this->_tvc;
    }

    public function getBocCache(): ?BocCacheType
    {
        return $this->_bocCache;
    }

    /**
     * @return self
     */
    public function setTvc(string $tvc): self
    {
        $this->_tvc = $tvc;
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
        if ($this->_tvc !== null) $result['tvc'] = $this->_tvc;
        if ($this->_bocCache !== null) $result['boc_cache'] = $this->_bocCache;
        return !empty($result) ? $result : new stdClass();
    }
}
