<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfDecodeBoc implements JsonSerializable
{
    /** @var AbiParam[] */
    private array $_params;
    private string $_boc;
    private bool $_allowPartial;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_params = isset($dto['params']) ? array_map(function ($i) { return new AbiParam($i); }, $dto['params']) : [];
        $this->_boc = $dto['boc'] ?? '';
        $this->_allowPartial = $dto['allow_partial'] ?? false;
    }

    /**
     * @return AbiParam[]
     */
    public function getParams(): array
    {
        return $this->_params;
    }

    public function getBoc(): string
    {
        return $this->_boc;
    }

    public function isAllowPartial(): bool
    {
        return $this->_allowPartial;
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
    public function setBoc(string $boc): self
    {
        $this->_boc = $boc;
        return $this;
    }

    /**
     * @return self
     */
    public function setAllowPartial(bool $allowPartial): self
    {
        $this->_allowPartial = $allowPartial;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_params !== null) $result['params'] = $this->_params;
        if ($this->_boc !== null) $result['boc'] = $this->_boc;
        if ($this->_allowPartial !== null) $result['allow_partial'] = $this->_allowPartial;
        return !empty($result) ? $result : new stdClass();
    }
}
