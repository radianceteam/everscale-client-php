<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;

class ResultOfGetBlockchainConfig implements JsonSerializable
{
    /** Blockchain config BOC encoded as base64 */
    private string $_configBoc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_configBoc = $dto['config_boc'];
    }

    /**
     * Blockchain config BOC encoded as base64
     */
    public function getConfigBoc(): string
    {
        return $this->_configBoc;
    }

    /**
     * Blockchain config BOC encoded as base64
     */
    public function setConfigBoc(string $configBoc): self
    {
        $this->_configBoc = $configBoc;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_configBoc !== null) $result['config_boc'] = $this->_configBoc;
        return $result;
    }
}
