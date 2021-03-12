<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class ParamsOfEncodeInternalMessage implements JsonSerializable
{
    /** Can be None if both deploy_set and call_set are None. */
    private ?Abi $_abi;

    /** Must be specified in case of non-deploy message. */
    private ?string $_address;
    private ?string $_srcAddress;

    /** Must be specified in case of deploy message. */
    private ?DeploySet $_deploySet;

    /**
     * Must be specified in case of non-deploy message.
     *
     * In case of deploy message it is optional and contains parameters
     * of the functions that will to be called upon deploy transaction.
     */
    private ?CallSet $_callSet;
    private string $_value;

    /** Default is true. */
    private ?bool $_bounce;

    /** Default is false. */
    private ?bool $_enableIhr;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_abi = isset($dto['abi']) ? Abi::create($dto['abi']) : null;
        $this->_address = $dto['address'] ?? null;
        $this->_srcAddress = $dto['src_address'] ?? null;
        $this->_deploySet = isset($dto['deploy_set']) ? new DeploySet($dto['deploy_set']) : null;
        $this->_callSet = isset($dto['call_set']) ? new CallSet($dto['call_set']) : null;
        $this->_value = $dto['value'] ?? '';
        $this->_bounce = $dto['bounce'] ?? null;
        $this->_enableIhr = $dto['enable_ihr'] ?? null;
    }

    /**
     * Can be None if both deploy_set and call_set are None.
     */
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

    public function getSrcAddress(): ?string
    {
        return $this->_srcAddress;
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

    public function getValue(): string
    {
        return $this->_value;
    }

    /**
     * Default is true.
     */
    public function isBounce(): ?bool
    {
        return $this->_bounce;
    }

    /**
     * Default is false.
     */
    public function isEnableIhr(): ?bool
    {
        return $this->_enableIhr;
    }

    /**
     * Can be None if both deploy_set and call_set are None.
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
     * @return self
     */
    public function setSrcAddress(?string $srcAddress): self
    {
        $this->_srcAddress = $srcAddress;
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
    public function setValue(string $value): self
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * Default is true.
     * @return self
     */
    public function setBounce(?bool $bounce): self
    {
        $this->_bounce = $bounce;
        return $this;
    }

    /**
     * Default is false.
     * @return self
     */
    public function setEnableIhr(?bool $enableIhr): self
    {
        $this->_enableIhr = $enableIhr;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_address !== null) $result['address'] = $this->_address;
        if ($this->_srcAddress !== null) $result['src_address'] = $this->_srcAddress;
        if ($this->_deploySet !== null) $result['deploy_set'] = $this->_deploySet;
        if ($this->_callSet !== null) $result['call_set'] = $this->_callSet;
        if ($this->_value !== null) $result['value'] = $this->_value;
        if ($this->_bounce !== null) $result['bounce'] = $this->_bounce;
        if ($this->_enableIhr !== null) $result['enable_ihr'] = $this->_enableIhr;
        return !empty($result) ? $result : new stdClass();
    }
}
