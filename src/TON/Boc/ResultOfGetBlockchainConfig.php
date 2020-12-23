<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use JsonSerializable;
use stdClass;

class ResultOfGetBlockchainConfig implements JsonSerializable
{
    private string $_configBoc;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_configBoc = $dto['config_boc'] ?? '';
    }

    public function getConfigBoc(): string
    {
        return $this->_configBoc;
    }

    public function setConfigBoc(string $configBoc): self
    {
        $this->_configBoc = $configBoc;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_configBoc !== null) $result['config_boc'] = $this->_configBoc;
        return !empty($result) ? $result : new stdClass();
    }
}
