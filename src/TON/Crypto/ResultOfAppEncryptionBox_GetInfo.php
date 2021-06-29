<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfAppEncryptionBox_GetInfo extends ResultOfAppEncryptionBox implements JsonSerializable
{
    private ?EncryptionBoxInfo $_info;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_info = isset($dto['info']) ? new EncryptionBoxInfo($dto['info']) : null;
    }

    public function getInfo(): ?EncryptionBoxInfo
    {
        return $this->_info;
    }

    /**
     * @return self
     */
    public function setInfo(?EncryptionBoxInfo $info): self
    {
        $this->_info = $info;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'GetInfo'];
        if ($this->_info !== null) $result['info'] = $this->_info;
        return !empty($result) ? $result : new stdClass();
    }
}
