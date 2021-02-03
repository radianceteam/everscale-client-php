<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfEncodeMessage implements JsonSerializable
{
    private ?Abi $_abi;

    /** Must be specified in case of non-deploy message. */
    private ?string $_address;

    /** Must be specified in case of deploy message. */
    private ?DeploySet $_deploySet;

    /**
     * Must be specified in case of non-deploy message.
     *
     * In case of deploy message it is optional and contains parameters
     * of the functions that will to be called upon deploy transaction.
     */
    private ?CallSet $_callSet;
    private ?Signer $_signer;

    /**
     * Used in message processing with retries (if contract's ABI includes "expire" header).
     *
     * Encoder uses the provided try index to calculate message
     * expiration time. The 1st message expiration time is specified in
     * Client config.
     *
     * Expiration timeouts will grow with every retry.
     * Retry grow factor is set in Client config:
     * <.....add config parameter with default value here>
     *
     * Default value is 0.
     */
    private ?int $_processingTryIndex;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_address = $dto['address'] ?? null;
        $this->_deploySet = isset($dto['deploy_set']) ? new DeploySet($dto['deploy_set']) : null;
        $this->_callSet = isset($dto['call_set']) ? new CallSet($dto['call_set']) : null;
        $this->_signer = isset($dto['signer']) ? Signer::create($dto['signer']) : null;
        $this->_processingTryIndex = $dto['processing_try_index'] ?? null;
    }

    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Must be specified in case of non-deploy message.
     */
    public function getAddress(): ?string
    {
        return $this->_address;
    }

    /**
     * Must be specified in case of deploy message.
     */
    public function getDeploySet(): ?DeploySet
    {
        return $this->_deploySet;
    }

    /**
     * Must be specified in case of non-deploy message.
     *
     * In case of deploy message it is optional and contains parameters
     * of the functions that will to be called upon deploy transaction.
     */
    public function getCallSet(): ?CallSet
    {
        return $this->_callSet;
    }

    public function getSigner(): ?Signer
    {
        return $this->_signer;
    }

    /**
     * Used in message processing with retries (if contract's ABI includes "expire" header).
     *
     * Encoder uses the provided try index to calculate message
     * expiration time. The 1st message expiration time is specified in
     * Client config.
     *
     * Expiration timeouts will grow with every retry.
     * Retry grow factor is set in Client config:
     * <.....add config parameter with default value here>
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
     * Must be specified in case of non-deploy message.
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->_address = $address;
        return $this;
    }

    /**
     * Must be specified in case of deploy message.
     * @return self
     */
    public function setDeploySet(?DeploySet $deploySet): self
    {
        $this->_deploySet = $deploySet;
        return $this;
    }

    /**
     * Must be specified in case of non-deploy message.
     *
     * In case of deploy message it is optional and contains parameters
     * of the functions that will to be called upon deploy transaction.
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
    public function setSigner(?Signer $signer): self
    {
        $this->_signer = $signer;
        return $this;
    }

    /**
     * Used in message processing with retries (if contract's ABI includes "expire" header).
     *
     * Encoder uses the provided try index to calculate message
     * expiration time. The 1st message expiration time is specified in
     * Client config.
     *
     * Expiration timeouts will grow with every retry.
     * Retry grow factor is set in Client config:
     * <.....add config parameter with default value here>
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
        if ($this->_address !== null) $result['address'] = $this->_address;
        if ($this->_deploySet !== null) $result['deploy_set'] = $this->_deploySet;
        if ($this->_callSet !== null) $result['call_set'] = $this->_callSet;
        if ($this->_signer !== null) $result['signer'] = $this->_signer;
        if ($this->_processingTryIndex !== null) $result['processing_try_index'] = $this->_processingTryIndex;
        return !empty($result) ? $result : new stdClass();
    }
}
