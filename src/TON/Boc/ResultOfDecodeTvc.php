<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ResultOfDecodeTvc implements JsonSerializable
{
    private ?string $_code;
    private ?string $_data;
    private ?string $_library;

    /** Specifies the contract ability to handle tick transactions */
    private ?bool $_tick;

    /** Specifies the contract ability to handle tock transactions */
    private ?bool $_tock;
    private ?int $_splitDepth;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_code = $dto['code'] ?? null;
        $this->_data = $dto['data'] ?? null;
        $this->_library = $dto['library'] ?? null;
        $this->_tick = $dto['tick'] ?? null;
        $this->_tock = $dto['tock'] ?? null;
        $this->_splitDepth = $dto['split_depth'] ?? null;
    }

    public function getCode(): ?string
    {
        return $this->_code;
    }

    public function getData(): ?string
    {
        return $this->_data;
    }

    public function getLibrary(): ?string
    {
        return $this->_library;
    }

    /**
     * Specifies the contract ability to handle tick transactions
     */
    public function isTick(): ?bool
    {
        return $this->_tick;
    }

    /**
     * Specifies the contract ability to handle tock transactions
     */
    public function isTock(): ?bool
    {
        return $this->_tock;
    }

    public function getSplitDepth(): ?int
    {
        return $this->_splitDepth;
    }

    /**
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * @return self
     */
    public function setData(?string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * @return self
     */
    public function setLibrary(?string $library): self
    {
        $this->_library = $library;
        return $this;
    }

    /**
     * Specifies the contract ability to handle tick transactions
     * @return self
     */
    public function setTick(?bool $tick): self
    {
        $this->_tick = $tick;
        return $this;
    }

    /**
     * Specifies the contract ability to handle tock transactions
     * @return self
     */
    public function setTock(?bool $tock): self
    {
        $this->_tock = $tock;
        return $this;
    }

    /**
     * @return self
     */
    public function setSplitDepth(?int $splitDepth): self
    {
        $this->_splitDepth = $splitDepth;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_code !== null) $result['code'] = $this->_code;
        if ($this->_data !== null) $result['data'] = $this->_data;
        if ($this->_library !== null) $result['library'] = $this->_library;
        if ($this->_tick !== null) $result['tick'] = $this->_tick;
        if ($this->_tock !== null) $result['tock'] = $this->_tock;
        if ($this->_splitDepth !== null) $result['split_depth'] = $this->_splitDepth;
        return !empty($result) ? $result : new stdClass();
    }
}
