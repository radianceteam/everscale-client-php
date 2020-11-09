<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;

class NetworkConfig implements JsonSerializable
{
    private string $_serverAddress;
    private int $_networkRetriesCount;
    private int $_messageRetriesCount;
    private int $_messageProcessingTimeout;
    private int $_waitForTimeout;
    private int $_outOfSyncThreshold;
    private string $_accessKey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_serverAddress = $dto['server_address'];
        $this->_networkRetriesCount = $dto['network_retries_count'];
        $this->_messageRetriesCount = $dto['message_retries_count'];
        $this->_messageProcessingTimeout = $dto['message_processing_timeout'];
        $this->_waitForTimeout = $dto['wait_for_timeout'];
        $this->_outOfSyncThreshold = $dto['out_of_sync_threshold'];
        $this->_accessKey = $dto['access_key'];
    }

    public function getServerAddress(): string
    {
        return $this->_serverAddress;
    }

    public function getNetworkRetriesCount(): ?int
    {
        return $this->_networkRetriesCount;
    }

    public function getMessageRetriesCount(): ?int
    {
        return $this->_messageRetriesCount;
    }

    public function getMessageProcessingTimeout(): ?int
    {
        return $this->_messageProcessingTimeout;
    }

    public function getWaitForTimeout(): ?int
    {
        return $this->_waitForTimeout;
    }

    public function getOutOfSyncThreshold(): ?int
    {
        return $this->_outOfSyncThreshold;
    }

    public function getAccessKey(): ?string
    {
        return $this->_accessKey;
    }

    public function setServerAddress(string $serverAddress): self
    {
        $this->_serverAddress = $serverAddress;
        return $this;
    }

    public function setNetworkRetriesCount(?int $networkRetriesCount): self
    {
        $this->_networkRetriesCount = $networkRetriesCount;
        return $this;
    }

    public function setMessageRetriesCount(?int $messageRetriesCount): self
    {
        $this->_messageRetriesCount = $messageRetriesCount;
        return $this;
    }

    public function setMessageProcessingTimeout(?int $messageProcessingTimeout): self
    {
        $this->_messageProcessingTimeout = $messageProcessingTimeout;
        return $this;
    }

    public function setWaitForTimeout(?int $waitForTimeout): self
    {
        $this->_waitForTimeout = $waitForTimeout;
        return $this;
    }

    public function setOutOfSyncThreshold(?int $outOfSyncThreshold): self
    {
        $this->_outOfSyncThreshold = $outOfSyncThreshold;
        return $this;
    }

    public function setAccessKey(?string $accessKey): self
    {
        $this->_accessKey = $accessKey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_serverAddress !== null) $result['server_address'] = $this->_serverAddress;
        if ($this->_networkRetriesCount !== null) $result['network_retries_count'] = $this->_networkRetriesCount;
        if ($this->_messageRetriesCount !== null) $result['message_retries_count'] = $this->_messageRetriesCount;
        if ($this->_messageProcessingTimeout !== null) $result['message_processing_timeout'] = $this->_messageProcessingTimeout;
        if ($this->_waitForTimeout !== null) $result['wait_for_timeout'] = $this->_waitForTimeout;
        if ($this->_outOfSyncThreshold !== null) $result['out_of_sync_threshold'] = $this->_outOfSyncThreshold;
        if ($this->_accessKey !== null) $result['access_key'] = $this->_accessKey;
        return $result;
    }
}
