<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfHDKeyDeriveFromXPrvPath implements JsonSerializable
{
    private string $_xprv;
    private string $_path;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_xprv = $dto['xprv'] ?? '';
        $this->_path = $dto['path'] ?? '';
    }

    public function getXprv(): string
    {
        return $this->_xprv;
    }

    public function getPath(): string
    {
        return $this->_path;
    }

    /**
     * @return self
     */
    public function setXprv(string $xprv): self
    {
        $this->_xprv = $xprv;
        return $this;
    }

    /**
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->_path = $path;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_xprv !== null) $result['xprv'] = $this->_xprv;
        if ($this->_path !== null) $result['path'] = $this->_path;
        return !empty($result) ? $result : new stdClass();
    }
}
