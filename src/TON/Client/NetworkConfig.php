<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class NetworkConfig implements JsonSerializable
{
    private ?string $_serverAddress;

    /** Any correct URL format can be specified, including IP addresses This parameter is prevailing over `server_address`. */
    private ?array $_endpoints;

    /** You must use `network.max_reconnect_timeout` that allows to specify maximum network resolving timeout. */
    private ?int $_networkRetriesCount;

    /** Default value is 120000 (2 min) */
    private ?int $_maxReconnectTimeout;
    private ?int $_reconnectTimeout;
    private ?int $_messageRetriesCount;
    private ?int $_messageProcessingTimeout;
    private ?int $_waitForTimeout;

    /**
     * If client's device time is out of sync and difference is more than the threshold then error will occur. Also an error will occur if the specified threshold is more than
     * `message_processing_timeout/2`.
     * The default value is 15 sec.
     */
    private ?int $_outOfSyncThreshold;
    private ?int $_sendingEndpointCount;

    /** At the moment is not used in production */
    private ?string $_accessKey;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_serverAddress = $dto['server_address'] ?? null;
        $this->_endpoints = $dto['endpoints'] ?? null;
        $this->_networkRetriesCount = $dto['network_retries_count'] ?? null;
        $this->_maxReconnectTimeout = $dto['max_reconnect_timeout'] ?? null;
        $this->_reconnectTimeout = $dto['reconnect_timeout'] ?? null;
        $this->_messageRetriesCount = $dto['message_retries_count'] ?? null;
        $this->_messageProcessingTimeout = $dto['message_processing_timeout'] ?? null;
        $this->_waitForTimeout = $dto['wait_for_timeout'] ?? null;
        $this->_outOfSyncThreshold = $dto['out_of_sync_threshold'] ?? null;
        $this->_sendingEndpointCount = $dto['sending_endpoint_count'] ?? null;
        $this->_accessKey = $dto['access_key'] ?? null;
    }

    public function getServerAddress(): ?string
    {
        return $this->_serverAddress;
    }

    /**
     * Any correct URL format can be specified, including IP addresses This parameter is prevailing over `server_address`.
     */
    public function getEndpoints(): ?array
    {
        return $this->_endpoints;
    }

    /**
     * You must use `network.max_reconnect_timeout` that allows to specify maximum network resolving timeout.
     */
    public function getNetworkRetriesCount(): ?int
    {
        return $this->_networkRetriesCount;
    }

    /**
     * Default value is 120000 (2 min)
     */
    public function getMaxReconnectTimeout(): ?int
    {
        return $this->_maxReconnectTimeout;
    }

    public function getReconnectTimeout(): ?int
    {
        return $this->_reconnectTimeout;
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

    /**
     * If client's device time is out of sync and difference is more than the threshold then error will occur. Also an error will occur if the specified threshold is more than
     * `message_processing_timeout/2`.
     * The default value is 15 sec.
     */
    public function getOutOfSyncThreshold(): ?int
    {
        return $this->_outOfSyncThreshold;
    }

    public function getSendingEndpointCount(): ?int
    {
        return $this->_sendingEndpointCount;
    }

    /**
     * At the moment is not used in production
     */
    public function getAccessKey(): ?string
    {
        return $this->_accessKey;
    }

    /**
     * @return self
     */
    public function setServerAddress(?string $serverAddress): self
    {
        $this->_serverAddress = $serverAddress;
        return $this;
    }

    /**
     * Any correct URL format can be specified, including IP addresses This parameter is prevailing over `server_address`.
     * @return self
     */
    public function setEndpoints(?array $endpoints): self
    {
        $this->_endpoints = $endpoints;
        return $this;
    }

    /**
     * You must use `network.max_reconnect_timeout` that allows to specify maximum network resolving timeout.
     * @return self
     */
    public function setNetworkRetriesCount(?int $networkRetriesCount): self
    {
        $this->_networkRetriesCount = $networkRetriesCount;
        return $this;
    }

    /**
     * Default value is 120000 (2 min)
     * @return self
     */
    public function setMaxReconnectTimeout(?int $maxReconnectTimeout): self
    {
        $this->_maxReconnectTimeout = $maxReconnectTimeout;
        return $this;
    }

    /**
     * @return self
     */
    public function setReconnectTimeout(?int $reconnectTimeout): self
    {
        $this->_reconnectTimeout = $reconnectTimeout;
        return $this;
    }

    /**
     * @return self
     */
    public function setMessageRetriesCount(?int $messageRetriesCount): self
    {
        $this->_messageRetriesCount = $messageRetriesCount;
        return $this;
    }

    /**
     * @return self
     */
    public function setMessageProcessingTimeout(?int $messageProcessingTimeout): self
    {
        $this->_messageProcessingTimeout = $messageProcessingTimeout;
        return $this;
    }

    /**
     * @return self
     */
    public function setWaitForTimeout(?int $waitForTimeout): self
    {
        $this->_waitForTimeout = $waitForTimeout;
        return $this;
    }

    /**
     * If client's device time is out of sync and difference is more than the threshold then error will occur. Also an error will occur if the specified threshold is more than
     * `message_processing_timeout/2`.
     * The default value is 15 sec.
     * @return self
     */
    public function setOutOfSyncThreshold(?int $outOfSyncThreshold): self
    {
        $this->_outOfSyncThreshold = $outOfSyncThreshold;
        return $this;
    }

    /**
     * @return self
     */
    public function setSendingEndpointCount(?int $sendingEndpointCount): self
    {
        $this->_sendingEndpointCount = $sendingEndpointCount;
        return $this;
    }

    /**
     * At the moment is not used in production
     * @return self
     */
    public function setAccessKey(?string $accessKey): self
    {
        $this->_accessKey = $accessKey;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_serverAddress !== null) $result['server_address'] = $this->_serverAddress;
        if ($this->_endpoints !== null) $result['endpoints'] = $this->_endpoints;
        if ($this->_networkRetriesCount !== null) $result['network_retries_count'] = $this->_networkRetriesCount;
        if ($this->_maxReconnectTimeout !== null) $result['max_reconnect_timeout'] = $this->_maxReconnectTimeout;
        if ($this->_reconnectTimeout !== null) $result['reconnect_timeout'] = $this->_reconnectTimeout;
        if ($this->_messageRetriesCount !== null) $result['message_retries_count'] = $this->_messageRetriesCount;
        if ($this->_messageProcessingTimeout !== null) $result['message_processing_timeout'] = $this->_messageProcessingTimeout;
        if ($this->_waitForTimeout !== null) $result['wait_for_timeout'] = $this->_waitForTimeout;
        if ($this->_outOfSyncThreshold !== null) $result['out_of_sync_threshold'] = $this->_outOfSyncThreshold;
        if ($this->_sendingEndpointCount !== null) $result['sending_endpoint_count'] = $this->_sendingEndpointCount;
        if ($this->_accessKey !== null) $result['access_key'] = $this->_accessKey;
        return !empty($result) ? $result : new stdClass();
    }
}
