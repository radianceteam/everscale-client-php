<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ParamsOfBatchQuery implements JsonSerializable
{
    /** @var ParamsOfQueryOperation[] */
    private array $_operations;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_operations = isset($dto['operations']) ? array_map(function ($i) { return ParamsOfQueryOperation::create($i); }, $dto['operations']) : [];
    }

    /**
     * @return ParamsOfQueryOperation[]
     */
    public function getOperations(): array
    {
        return $this->_operations;
    }

    /**
     * @param ParamsOfQueryOperation[] $operations
     * @return self
     */
    public function setOperations(array $operations): self
    {
        $this->_operations = $operations;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_operations !== null) $result['operations'] = $this->_operations;
        return !empty($result) ? $result : new stdClass();
    }
}
