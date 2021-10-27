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
    private ?string $_codeHash;
    private ?int $_codeDepth;
    private ?string $_data;
    private ?string $_dataHash;
    private ?int $_dataDepth;
    private ?string $_library;

    /** Specifies the contract ability to handle tick transactions */
    private ?bool $_tick;

    /** Specifies the contract ability to handle tock transactions */
    private ?bool $_tock;
    private ?int $_splitDepth;
    private ?string $_compilerVersion;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_code = $dto['code'] ?? null;
        $this->_codeHash = $dto['code_hash'] ?? null;
        $this->_codeDepth = $dto['code_depth'] ?? null;
        $this->_data = $dto['data'] ?? null;
        $this->_dataHash = $dto['data_hash'] ?? null;
        $this->_dataDepth = $dto['data_depth'] ?? null;
        $this->_library = $dto['library'] ?? null;
        $this->_tick = $dto['tick'] ?? null;
        $this->_tock = $dto['tock'] ?? null;
        $this->_splitDepth = $dto['split_depth'] ?? null;
        $this->_compilerVersion = $dto['compiler_version'] ?? null;
    }

    public function getCode(): ?string
    {
        return $this->_code;
    }

    public function getCodeHash(): ?string
    {
        return $this->_codeHash;
    }

    public function getCodeDepth(): ?int
    {
        return $this->_codeDepth;
    }

    public function getData(): ?string
    {
        return $this->_data;
    }

    public function getDataHash(): ?string
    {
        return $this->_dataHash;
    }

    public function getDataDepth(): ?int
    {
        return $this->_dataDepth;
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

    public function getCompilerVersion(): ?string
    {
        return $this->_compilerVersion;
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
    public function setCodeHash(?string $codeHash): self
    {
        $this->_codeHash = $codeHash;
        return $this;
    }

    /**
     * @return self
     */
    public function setCodeDepth(?int $codeDepth): self
    {
        $this->_codeDepth = $codeDepth;
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
    public function setDataHash(?string $dataHash): self
    {
        $this->_dataHash = $dataHash;
        return $this;
    }

    /**
     * @return self
     */
    public function setDataDepth(?int $dataDepth): self
    {
        $this->_dataDepth = $dataDepth;
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

    /**
     * @return self
     */
    public function setCompilerVersion(?string $compilerVersion): self
    {
        $this->_compilerVersion = $compilerVersion;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_code !== null) $result['code'] = $this->_code;
        if ($this->_codeHash !== null) $result['code_hash'] = $this->_codeHash;
        if ($this->_codeDepth !== null) $result['code_depth'] = $this->_codeDepth;
        if ($this->_data !== null) $result['data'] = $this->_data;
        if ($this->_dataHash !== null) $result['data_hash'] = $this->_dataHash;
        if ($this->_dataDepth !== null) $result['data_depth'] = $this->_dataDepth;
        if ($this->_library !== null) $result['library'] = $this->_library;
        if ($this->_tick !== null) $result['tick'] = $this->_tick;
        if ($this->_tock !== null) $result['tock'] = $this->_tock;
        if ($this->_splitDepth !== null) $result['split_depth'] = $this->_splitDepth;
        if ($this->_compilerVersion !== null) $result['compiler_version'] = $this->_compilerVersion;
        return !empty($result) ? $result : new stdClass();
    }
}
