<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class EncodingParams extends MessageSource implements JsonSerializable
{
    /** Contract ABI. */
    private ?Abi $_abi;

    /**
     * Target address the message will be sent to.
     *
     *  Must be specified in case of non-deploy message.
     */
    private ?string $_address;

    /**
     * Deploy parameters.
     *
     *  Must be specified in case of deploy message.
     */
    private ?DeploySet $_deploySet;

    /**
     * Function call parameters.
     *
     *  Must be specified in case of non-deploy message.
     *
     *  In case of deploy message it is optional and contains parameters
     *  of the functions that will to be called upon deploy transaction.
     */
    private ?CallSet $_callSet;

    /** Signing parameters. */
    private ?Signer $_signer;

    /**
     * Processing try index.
     *
     *  Used in message processing with retries (if contract's ABI includes "expire" header).
     *
     *  Encoder uses the provided try index to calculate message
     *  expiration time. The 1st message expiration time is specified in
     *  Client config.
     *
     *  Expiration timeouts will grow with every retry.
     *  Retry grow factor is set in Client config:
     *  <.....add config parameter with default value here>
     *
     *  Default value is 0.
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

    /**
     * Contract ABI.
     */
    public function getAbi(): ?Abi
    {
        return $this->_abi;
    }

    /**
     * Target address the message will be sent to.
     *
     *  Must be specified in case of non-deploy message.
     */
    public function getAddress(): ?string
    {
        return $this->_address;
    }

    /**
     * Deploy parameters.
     *
     *  Must be specified in case of deploy message.
     */
    public function getDeploySet(): ?DeploySet
    {
        return $this->_deploySet;
    }

    /**
     * Function call parameters.
     *
     *  Must be specified in case of non-deploy message.
     *
     *  In case of deploy message it is optional and contains parameters
     *  of the functions that will to be called upon deploy transaction.
     */
    public function getCallSet(): ?CallSet
    {
        return $this->_callSet;
    }

    /**
     * Signing parameters.
     */
    public function getSigner(): ?Signer
    {
        return $this->_signer;
    }

    /**
     * Processing try index.
     *
     *  Used in message processing with retries (if contract's ABI includes "expire" header).
     *
     *  Encoder uses the provided try index to calculate message
     *  expiration time. The 1st message expiration time is specified in
     *  Client config.
     *
     *  Expiration timeouts will grow with every retry.
     *  Retry grow factor is set in Client config:
     *  <.....add config parameter with default value here>
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
    public function setAbi(?Abi $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * Target address the message will be sent to.
     *
     *  Must be specified in case of non-deploy message.
     */
    public function setAddress(?string $address): self
    {
        $this->_address = $address;
        return $this;
    }

    /**
     * Deploy parameters.
     *
     *  Must be specified in case of deploy message.
     */
    public function setDeploySet(?DeploySet $deploySet): self
    {
        $this->_deploySet = $deploySet;
        return $this;
    }

    /**
     * Function call parameters.
     *
     *  Must be specified in case of non-deploy message.
     *
     *  In case of deploy message it is optional and contains parameters
     *  of the functions that will to be called upon deploy transaction.
     */
    public function setCallSet(?CallSet $callSet): self
    {
        $this->_callSet = $callSet;
        return $this;
    }

    /**
     * Signing parameters.
     */
    public function setSigner(?Signer $signer): self
    {
        $this->_signer = $signer;
        return $this;
    }

    /**
     * Processing try index.
     *
     *  Used in message processing with retries (if contract's ABI includes "expire" header).
     *
     *  Encoder uses the provided try index to calculate message
     *  expiration time. The 1st message expiration time is specified in
     *  Client config.
     *
     *  Expiration timeouts will grow with every retry.
     *  Retry grow factor is set in Client config:
     *  <.....add config parameter with default value here>
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
        $result = ['type' => 'EncodingParams'];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_address !== null) $result['address'] = $this->_address;
        if ($this->_deploySet !== null) $result['deploy_set'] = $this->_deploySet;
        if ($this->_callSet !== null) $result['call_set'] = $this->_callSet;
        if ($this->_signer !== null) $result['signer'] = $this->_signer;
        if ($this->_processingTryIndex !== null) $result['processing_try_index'] = $this->_processingTryIndex;
        return !empty($result) ? $result : new stdClass();
    }
}
