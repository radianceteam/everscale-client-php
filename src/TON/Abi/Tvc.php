<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class Tvc extends StateInitSource implements JsonSerializable
{
    private string $_tvc;
    private ?string $_publicKey;
    private ?StateInitParams $_initParams;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_tvc = $dto['tvc'] ?? '';
        $this->_publicKey = $dto['public_key'] ?? null;
        $this->_initParams = new StateInitParams($dto['init_params'] ?? []);
    }

    public function getTvc(): string
    {
        return $this->_tvc;
    }

    public function getPublicKey(): ?string
    {
        return $this->_publicKey;
    }

    public function getInitParams(): ?StateInitParams
    {
        return $this->_initParams;
    }

    public function setTvc(string $tvc): self
    {
        $this->_tvc = $tvc;
        return $this;
    }

    public function setPublicKey(?string $publicKey): self
    {
        $this->_publicKey = $publicKey;
        return $this;
    }

    public function setInitParams(?StateInitParams $initParams): self
    {
        $this->_initParams = $initParams;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Tvc'];
        if ($this->_tvc !== null) $result['tvc'] = $this->_tvc;
        if ($this->_publicKey !== null) $result['public_key'] = $this->_publicKey;
        if ($this->_initParams !== null) $result['init_params'] = $this->_initParams;
        return $result;
    }
}
