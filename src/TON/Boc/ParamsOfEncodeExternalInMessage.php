<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfEncodeExternalInMessage implements JsonSerializable
{
    private ?string $_src;
    private string $_dst;
    private ?string $_init;
    private ?string $_body;

    /** The BOC itself returned if no cache type provided */
    private ?BocCacheType $_bocCache;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_src = $dto['src'] ?? null;
        $this->_dst = $dto['dst'] ?? '';
        $this->_init = $dto['init'] ?? null;
        $this->_body = $dto['body'] ?? null;
        $this->_bocCache = isset($dto['boc_cache']) ? BocCacheType::create($dto['boc_cache']) : null;
    }

    public function getSrc(): ?string
    {
        return $this->_src;
    }

    public function getDst(): string
    {
        return $this->_dst;
    }

    public function getInit(): ?string
    {
        return $this->_init;
    }

    public function getBody(): ?string
    {
        return $this->_body;
    }

    /**
     * The BOC itself returned if no cache type provided
     */
    public function getBocCache(): ?BocCacheType
    {
        return $this->_bocCache;
    }

    /**
     * @return self
     */
    public function setSrc(?string $src): self
    {
        $this->_src = $src;
        return $this;
    }

    /**
     * @return self
     */
    public function setDst(string $dst): self
    {
        $this->_dst = $dst;
        return $this;
    }

    /**
     * @return self
     */
    public function setInit(?string $init): self
    {
        $this->_init = $init;
        return $this;
    }

    /**
     * @return self
     */
    public function setBody(?string $body): self
    {
        $this->_body = $body;
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
        if ($this->_src !== null) $result['src'] = $this->_src;
        if ($this->_dst !== null) $result['dst'] = $this->_dst;
        if ($this->_init !== null) $result['init'] = $this->_init;
        if ($this->_body !== null) $result['body'] = $this->_body;
        if ($this->_bocCache !== null) $result['boc_cache'] = $this->_bocCache;
        return !empty($result) ? $result : new stdClass();
    }
}
