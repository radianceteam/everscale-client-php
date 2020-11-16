<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ResultOfEncodeAccount implements JsonSerializable
{
    /** Account BOC encoded in `base64`. */
    private string $_account;

    /** Account ID  encoded in `hex`. */
    private string $_id;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_account = $dto['account'] ?? '';
        $this->_id = $dto['id'] ?? '';
    }

    /**
     * Account BOC encoded in `base64`.
     */
    public function getAccount(): string
    {
        return $this->_account;
    }

    /**
     * Account ID  encoded in `hex`.
     */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
     * Account BOC encoded in `base64`.
     */
    public function setAccount(string $account): self
    {
        $this->_account = $account;
        return $this;
    }

    /**
     * Account ID  encoded in `hex`.
     */
    public function setId(string $id): self
    {
        $this->_id = $id;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_account !== null) $result['account'] = $this->_account;
        if ($this->_id !== null) $result['id'] = $this->_id;
        return !empty($result) ? $result : new stdClass();
    }
}
