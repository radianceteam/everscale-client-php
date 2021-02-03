<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ParamsOfGetBlockchainConfig implements JsonSerializable
{
    private string $_blockBoc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_blockBoc = $dto['block_boc'] ?? '';
    }

    public function getBlockBoc(): string
    {
        return $this->_blockBoc;
    }

    /**
     * @return self
     */
    public function setBlockBoc(string $blockBoc): self
    {
        $this->_blockBoc = $blockBoc;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_blockBoc !== null) $result['block_boc'] = $this->_blockBoc;
        return !empty($result) ? $result : new stdClass();
    }
}
