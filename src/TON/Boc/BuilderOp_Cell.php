<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class BuilderOp_Cell extends BuilderOp implements JsonSerializable
{
    /** @var BuilderOp[] */
    private array $_builder;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_builder = $dto['builder'] ?? [];
    }

    /**
     * @return BuilderOp[]
     */
    public function getBuilder(): array
    {
        return $this->_builder;
    }

    /**
     * @param BuilderOp[] $builder
     * @return self
     */
    public function setBuilder(array $builder): self
    {
        $this->_builder = $builder;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Cell'];
        if ($this->_builder !== null) $result['builder'] = $this->_builder;
        return !empty($result) ? $result : new stdClass();
    }
}
