<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;

class ParamsOfGetBlockchainConfig implements JsonSerializable
{
    /** Key block BOC encoded as base64 */
    private string $_blockBoc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_blockBoc = $dto['block_boc'];
    }

    /**
     * Key block BOC encoded as base64
     */
    public function getBlockBoc(): string
    {
        return $this->_blockBoc;
    }

    /**
     * Key block BOC encoded as base64
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
        return $result;
    }
}
