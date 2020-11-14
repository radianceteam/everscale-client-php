<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;

class ParamsOfEncodeMessageBody implements JsonSerializable
{
    /** Contract ABI. */
    private Abi $_abi;

    /**
     * Function call parameters.
     *
     *  Must be specified in non deploy message.
     *
     *  In case of deploy message contains parameters of constructor.
     */
    private CallSet $_callSet;

    /** True if internal message body must be encoded. */
    private bool $_isInternal;

    /** Signing parameters. */
    private Signer $_signer;

    /**
     * Processing try index.
     *
     *  Used in message processing with retries.
     *
     *  Encoder uses the provided try index to calculate message
     *  expiration time.
     *
     *  Expiration timeouts will grow with every retry.
     *
     *  Default value is 0.
     */
    private ?int $_processingTryIndex;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = new Abi($dto['abi'] ?? []);
        $this->_callSet = new CallSet($dto['call_set'] ?? []);
        $this->_isInternal = $dto['is_internal'] ?? false;
        $this->_signer = new Signer($dto['signer'] ?? []);
        $this->_processingTryIndex = $dto['processing_try_index'] ?? null;
    }

    /**
     * Contract ABI.
     */
    public function getAbi(): Abi
    {
        return $this->_abi;
    }

    /**
     * Function call parameters.
     *
     *  Must be specified in non deploy message.
     *
     *  In case of deploy message contains parameters of constructor.
     */
    public function getCallSet(): CallSet
    {
        return $this->_callSet;
    }

    /**
     * True if internal message body must be encoded.
     */
    public function isIsInternal(): bool
    {
        return $this->_isInternal;
    }

    /**
     * Signing parameters.
     */
    public function getSigner(): Signer
    {
        return $this->_signer;
    }

    /**
     * Processing try index.
     *
     *  Used in message processing with retries.
     *
     *  Encoder uses the provided try index to calculate message
     *  expiration time.
     *
     *  Expiration timeouts will grow with every retry.
     *
     *  Default value is 0.
     */
    public function getProcessingTryIndex(): ?int
    {
        return $this->_processingTryIndex;
    }

    /**
     * Contract ABI.
     */
    public function setAbi(Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Function call parameters.
     *
     *  Must be specified in non deploy message.
     *
     *  In case of deploy message contains parameters of constructor.
     */
    public function setCallSet(CallSet $callSet): self
    {
        $this->_callSet = $callSet;
        return $this;
    }

    /**
     * True if internal message body must be encoded.
     */
    public function setIsInternal(bool $isInternal): self
    {
        $this->_isInternal = $isInternal;
        return $this;
    }

    /**
     * Signing parameters.
     */
    public function setSigner(Signer $signer): self
    {
        $this->_signer = $signer;
        return $this;
    }

    /**
     * Processing try index.
     *
     *  Used in message processing with retries.
     *
     *  Encoder uses the provided try index to calculate message
     *  expiration time.
     *
     *  Expiration timeouts will grow with every retry.
     *
     *  Default value is 0.
     */
    public function setProcessingTryIndex(?int $processingTryIndex): self
    {
        $this->_processingTryIndex = $processingTryIndex;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_callSet !== null) $result['call_set'] = $this->_callSet;
        if ($this->_isInternal !== null) $result['is_internal'] = $this->_isInternal;
        if ($this->_signer !== null) $result['signer'] = $this->_signer;
        if ($this->_processingTryIndex !== null) $result['processing_try_index'] = $this->_processingTryIndex;
        return $result;
    }
}
