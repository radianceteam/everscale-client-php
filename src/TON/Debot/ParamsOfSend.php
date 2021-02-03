<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfSend implements JsonSerializable
{
    private int $_debotHandle;
    private string $_source;
    private int $_funcId;
    private string $_params;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_debotHandle = $dto['debot_handle'] ?? 0;
        $this->_source = $dto['source'] ?? '';
        $this->_funcId = $dto['func_id'] ?? 0;
        $this->_params = $dto['params'] ?? '';
    }

    public function getDebotHandle(): int
    {
        return $this->_debotHandle;
    }

    public function getSource(): string
    {
        return $this->_source;
    }

    public function getFuncId(): int
    {
        return $this->_funcId;
    }

    public function getParams(): string
    {
        return $this->_params;
    }

    /**
     * @return self
     */
    public function setDebotHandle(int $debotHandle): self
    {
        $this->_debotHandle = $debotHandle;
        return $this;
    }

    /**
     * @return self
     */
    public function setSource(string $source): self
    {
        $this->_source = $source;
        return $this;
    }

    /**
     * @return self
     */
    public function setFuncId(int $funcId): self
    {
        $this->_funcId = $funcId;
        return $this;
    }

    /**
     * @return self
     */
    public function setParams(string $params): self
    {
        $this->_params = $params;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_debotHandle !== null) $result['debot_handle'] = $this->_debotHandle;
        if ($this->_source !== null) $result['source'] = $this->_source;
        if ($this->_funcId !== null) $result['func_id'] = $this->_funcId;
        if ($this->_params !== null) $result['params'] = $this->_params;
        return !empty($result) ? $result : new stdClass();
    }
}
