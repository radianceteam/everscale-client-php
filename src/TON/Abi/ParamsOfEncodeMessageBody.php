<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfEncodeMessageBody implements JsonSerializable
{
    private ?Abi $_abi;

    /**
     * Must be specified in non deploy message.
     *
     * In case of deploy message contains parameters of constructor.
     */
    private ?CallSet $_callSet;
    private bool $_isInternal;
    private ?Signer $_signer;

    /**
     * Used in message processing with retries.
     *
     * Encoder uses the provided try index to calculate message
     * expiration time.
     *
     * Expiration timeouts will grow with every retry.
     *
     * Default value is 0.
     */
    private ?int $_processingTryIndex;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_callSet = isset($dto['call_set']) ? new CallSet($dto['call_set']) : null;
        $this->_isInternal = $dto['is_internal'] ?? false;
        $this->_signer = isset($dto['signer']) ? Signer::create($dto['signer']) : null;
        $this->_processingTryIndex = $dto['processing_try_index'] ?? null;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Must be specified in non deploy message.
     *
     * In case of deploy message contains parameters of constructor.
     */
    public function getCallSet(): ?CallSet
    {
        return $this->_callSet;
    }

    public function isIsInternal(): bool
    {
        return $this->_isInternal;
    }

    public function getSigner(): ?Signer
    {
        return $this->_signer;
    }

    /**
     * Used in message processing with retries.
     *
     * Encoder uses the provided try index to calculate message
     * expiration time.
     *
     * Expiration timeouts will grow with every retry.
     *
     * Default value is 0.
     */
    public function getProcessingTryIndex(): ?int
    {
        return $this->_processingTryIndex;
    }

    /**
     * @return self
     */
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Must be specified in non deploy message.
     *
     * In case of deploy message contains parameters of constructor.
     * @return self
     */
    public function setCallSet(?CallSet $callSet): self
    {
        $this->_callSet = $callSet;
        return $this;
    }

    /**
     * @return self
     */
    public function setIsInternal(bool $isInternal): self
    {
        $this->_isInternal = $isInternal;
        return $this;
    }

    /**
     * @return self
     */
    public function setSigner(?Signer $signer): self
    {
        $this->_signer = $signer;
        return $this;
    }

    /**
     * Used in message processing with retries.
     *
     * Encoder uses the provided try index to calculate message
     * expiration time.
     *
     * Expiration timeouts will grow with every retry.
     *
     * Default value is 0.
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
