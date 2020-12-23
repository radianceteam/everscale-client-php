<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class StateInitSource_StateInit extends StateInitSource implements JsonSerializable
{
    /** Encoded in `base64`. */
    private string $_code;

    /** Encoded in `base64`. */
    private string $_data;

    /** Encoded in `base64`. */
    private ?string $_library;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_code = $dto['code'] ?? '';
        $this->_data = $dto['data'] ?? '';
        $this->_library = $dto['library'] ?? null;
    }

    /**
     * Encoded in `base64`.
     */
    public function getCode(): string
    {
        return $this->_code;
    }

    /**
     * Encoded in `base64`.
     */
    public function getData(): string
    {
        return $this->_data;
    }

    /**
     * Encoded in `base64`.
     */
    public function getLibrary(): ?string
    {
        return $this->_library;
    }

    /**
     * Encoded in `base64`.
     */
    public function setCode(string $code): self
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * Encoded in `base64`.
     */
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * Encoded in `base64`.
     */
    public function setLibrary(?string $library): self
    {
        $this->_library = $library;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'StateInit'];
        if ($this->_code !== null) $result['code'] = $this->_code;
        if ($this->_data !== null) $result['data'] = $this->_data;
        if ($this->_library !== null) $result['library'] = $this->_library;
        return !empty($result) ? $result : new stdClass();
    }
}
