<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use JsonSerializable;

class ResultOfRunTvm implements JsonSerializable
{
    /** List of output messages' BOCs. Encoded as `base64` */
    private array $_outMessages;

    /**
     * Optional decoded message bodies according to the optional
     *  `abi` parameter.
     */
    private ?DecodedOutput $_decoded;

    /**
     * Updated account state BOC. Encoded as `base64`.
     *  Attention! Only data in account state is updated.
     */
    private string $_account;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_outMessages = $dto['out_messages'] ?? [];
        $this->_decoded = new DecodedOutput($dto['decoded'] ?? []);
        $this->_account = $dto['account'] ?? '';
    }

    /**
     * List of output messages' BOCs. Encoded as `base64`
     */
    public function getOutMessages(): array
    {
        return $this->_outMessages;
    }

    /**
     * Optional decoded message bodies according to the optional
     *  `abi` parameter.
     */
    public function getDecoded(): ?DecodedOutput
    {
        return $this->_decoded;
    }

    /**
     * Updated account state BOC. Encoded as `base64`.
     *  Attention! Only data in account state is updated.
     */
    public function getAccount(): string
    {
        return $this->_account;
    }

    /**
     * List of output messages' BOCs. Encoded as `base64`
     */
    public function setOutMessages(array $outMessages): self
    {
        $this->_outMessages = $outMessages;
        return $this;
    }

    /**
     * Optional decoded message bodies according to the optional
     *  `abi` parameter.
     */
    public function setDecoded(?DecodedOutput $decoded): self
    {
        $this->_decoded = $decoded;
        return $this;
    }

    /**
     * Updated account state BOC. Encoded as `base64`.
     *  Attention! Only data in account state is updated.
     */
    public function setAccount(string $account): self
    {
        $this->_account = $account;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_outMessages !== null) $result['out_messages'] = $this->_outMessages;
        if ($this->_decoded !== null) $result['decoded'] = $this->_decoded;
        if ($this->_account !== null) $result['account'] = $this->_account;
        return $result;
    }
}
