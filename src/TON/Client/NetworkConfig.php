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

    /**
     * Any correct URL format can be specified, including IP addresses. This parameter is prevailing over `server_address`.
     * Check the full list of [supported network endpoints](../ton-os-api/networks.md).
     */
    private ?array $_endpoints;

    /** You must use `network.max_reconnect_timeout` that allows to specify maximum network resolving timeout. */
    private ?int $_networkRetriesCount;

    /** Must be specified in milliseconds. Default is 120000 (2 min). */
    private ?int $_maxReconnectTimeout;
    private ?int $_reconnectTimeout;

    /** Default is 5. */
    private ?int $_messageRetriesCount;

    /** Must be specified in milliseconds. Default is 40000 (40 sec). */
    private ?int $_messageProcessingTimeout;

    /** Must be specified in milliseconds. Default is 40000 (40 sec). */
    private ?int $_waitForTimeout;

    /**
     * If client's device time is out of sync and difference is more than the threshold then error will occur. Also an error will occur if the specified threshold is more than
     * `message_processing_timeout/2`.
     *
     * Must be specified in milliseconds. Default is 15000 (15 sec).
     */
    private ?int $_outOfSyncThreshold;

    /** Default is 1. */
    private ?int $_sendingEndpointCount;

    /**
     * Library periodically checks the current endpoint for blockchain data syncronization latency.
     * If the latency (time-lag) is less then `NetworkConfig.max_latency`
     * then library selects another endpoint.
     *
     * Must be specified in milliseconds. Default is 60000 (1 min).
     */
    private ?int $_latencyDetectionInterval;

    /** Must be specified in milliseconds. Default is 60000 (1 min). */
    private ?int $_maxLatency;

    /**
     * Is is used when no timeout specified for the request to limit the answer waiting time. If no answer received during the timeout requests ends with
     * error.
     *
     * Must be specified in milliseconds. Default is 60000 (1 min).
     */
    private ?int $_queryTimeout;

    /**
     * `HTTP` or `WS`.
     * Default is `HTTP`.
     */
    private ?string $_queriesProtocol;

    /**
     * First REMP status awaiting timeout. If no status recieved during the timeout than fallback transaction scenario is activated.
     *
     * Must be specified in milliseconds. Default is 1000 (1 sec).
     */
    private ?int $_firstRempStatusTimeout;

    /**
     * Subsequent REMP status awaiting timeout. If no status recieved during the timeout than fallback transaction scenario is activated.
     *
     * Must be specified in milliseconds. Default is 5000 (5 sec).
     */
    private ?int $_nextRempStatusTimeout;

    /** You can specify here Evercloud project secret ot serialized JWT. */
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
        $this->_latencyDetectionInterval = $dto['latency_detection_interval'] ?? null;
        $this->_maxLatency = $dto['max_latency'] ?? null;
        $this->_queryTimeout = $dto['query_timeout'] ?? null;
        $this->_queriesProtocol = $dto['queries_protocol'] ?? null;
        $this->_firstRempStatusTimeout = $dto['first_remp_status_timeout'] ?? null;
        $this->_nextRempStatusTimeout = $dto['next_remp_status_timeout'] ?? null;
        $this->_accessKey = $dto['access_key'] ?? null;
    }

    public function getServerAddress(): ?string
    {
        return $this->_serverAddress;
    }

    /**
     * Any correct URL format can be specified, including IP addresses. This parameter is prevailing over `server_address`.
     * Check the full list of [supported network endpoints](../ton-os-api/networks.md).
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
     * Must be specified in milliseconds. Default is 120000 (2 min).
     */
    public function getMaxReconnectTimeout(): ?int
    {
        return $this->_maxReconnectTimeout;
    }

    public function getReconnectTimeout(): ?int
    {
        return $this->_reconnectTimeout;
    }

    /**
     * Default is 5.
     */
    public function getMessageRetriesCount(): ?int
    {
        return $this->_messageRetriesCount;
    }

    /**
     * Must be specified in milliseconds. Default is 40000 (40 sec).
     */
    public function getMessageProcessingTimeout(): ?int
    {
        return $this->_messageProcessingTimeout;
    }

    /**
     * Must be specified in milliseconds. Default is 40000 (40 sec).
     */
    public function getWaitForTimeout(): ?int
    {
        return $this->_waitForTimeout;
    }

    /**
     * If client's device time is out of sync and difference is more than the threshold then error will occur. Also an error will occur if the specified threshold is more than
     * `message_processing_timeout/2`.
     *
     * Must be specified in milliseconds. Default is 15000 (15 sec).
     */
    public function getOutOfSyncThreshold(): ?int
    {
        return $this->_outOfSyncThreshold;
    }

    /**
     * Default is 1.
     */
    public function getSendingEndpointCount(): ?int
    {
        return $this->_sendingEndpointCount;
    }

    /**
     * Library periodically checks the current endpoint for blockchain data syncronization latency.
     * If the latency (time-lag) is less then `NetworkConfig.max_latency`
     * then library selects another endpoint.
     *
     * Must be specified in milliseconds. Default is 60000 (1 min).
     */
    public function getLatencyDetectionInterval(): ?int
    {
        return $this->_latencyDetectionInterval;
    }

    /**
     * Must be specified in milliseconds. Default is 60000 (1 min).
     */
    public function getMaxLatency(): ?int
    {
        return $this->_maxLatency;
    }

    /**
     * Is is used when no timeout specified for the request to limit the answer waiting time. If no answer received during the timeout requests ends with
     * error.
     *
     * Must be specified in milliseconds. Default is 60000 (1 min).
     */
    public function getQueryTimeout(): ?int
    {
        return $this->_queryTimeout;
    }

    /**
     * `HTTP` or `WS`.
     * Default is `HTTP`.
     */
    public function getQueriesProtocol(): ?string
    {
        return $this->_queriesProtocol;
    }

    /**
     * First REMP status awaiting timeout. If no status recieved during the timeout than fallback transaction scenario is activated.
     *
     * Must be specified in milliseconds. Default is 1000 (1 sec).
     */
    public function getFirstRempStatusTimeout(): ?int
    {
        return $this->_firstRempStatusTimeout;
    }

    /**
     * Subsequent REMP status awaiting timeout. If no status recieved during the timeout than fallback transaction scenario is activated.
     *
     * Must be specified in milliseconds. Default is 5000 (5 sec).
     */
    public function getNextRempStatusTimeout(): ?int
    {
        return $this->_nextRempStatusTimeout;
    }

    /**
     * You can specify here Evercloud project secret ot serialized JWT.
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
     * Any correct URL format can be specified, including IP addresses. This parameter is prevailing over `server_address`.
     * Check the full list of [supported network endpoints](../ton-os-api/networks.md).
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
     * Must be specified in milliseconds. Default is 120000 (2 min).
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
     * Default is 5.
     * @return self
     */
    public function setMessageRetriesCount(?int $messageRetriesCount): self
    {
        $this->_messageRetriesCount = $messageRetriesCount;
        return $this;
    }

    /**
     * Must be specified in milliseconds. Default is 40000 (40 sec).
     * @return self
     */
    public function setMessageProcessingTimeout(?int $messageProcessingTimeout): self
    {
        $this->_messageProcessingTimeout = $messageProcessingTimeout;
        return $this;
    }

    /**
     * Must be specified in milliseconds. Default is 40000 (40 sec).
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
     *
     * Must be specified in milliseconds. Default is 15000 (15 sec).
     * @return self
     */
    public function setOutOfSyncThreshold(?int $outOfSyncThreshold): self
    {
        $this->_outOfSyncThreshold = $outOfSyncThreshold;
        return $this;
    }

    /**
     * Default is 1.
     * @return self
     */
    public function setSendingEndpointCount(?int $sendingEndpointCount): self
    {
        $this->_sendingEndpointCount = $sendingEndpointCount;
        return $this;
    }

    /**
     * Library periodically checks the current endpoint for blockchain data syncronization latency.
     * If the latency (time-lag) is less then `NetworkConfig.max_latency`
     * then library selects another endpoint.
     *
     * Must be specified in milliseconds. Default is 60000 (1 min).
     * @return self
     */
    public function setLatencyDetectionInterval(?int $latencyDetectionInterval): self
    {
        $this->_latencyDetectionInterval = $latencyDetectionInterval;
        return $this;
    }

    /**
     * Must be specified in milliseconds. Default is 60000 (1 min).
     * @return self
     */
    public function setMaxLatency(?int $maxLatency): self
    {
        $this->_maxLatency = $maxLatency;
        return $this;
    }

    /**
     * Is is used when no timeout specified for the request to limit the answer waiting time. If no answer received during the timeout requests ends with
     * error.
     *
     * Must be specified in milliseconds. Default is 60000 (1 min).
     * @return self
     */
    public function setQueryTimeout(?int $queryTimeout): self
    {
        $this->_queryTimeout = $queryTimeout;
        return $this;
    }

    /**
     * `HTTP` or `WS`.
     * Default is `HTTP`.
     * @return self
     */
    public function setQueriesProtocol(?string $queriesProtocol): self
    {
        $this->_queriesProtocol = $queriesProtocol;
        return $this;
    }

    /**
     * First REMP status awaiting timeout. If no status recieved during the timeout than fallback transaction scenario is activated.
     *
     * Must be specified in milliseconds. Default is 1000 (1 sec).
     * @return self
     */
    public function setFirstRempStatusTimeout(?int $firstRempStatusTimeout): self
    {
        $this->_firstRempStatusTimeout = $firstRempStatusTimeout;
        return $this;
    }

    /**
     * Subsequent REMP status awaiting timeout. If no status recieved during the timeout than fallback transaction scenario is activated.
     *
     * Must be specified in milliseconds. Default is 5000 (5 sec).
     * @return self
     */
    public function setNextRempStatusTimeout(?int $nextRempStatusTimeout): self
    {
        $this->_nextRempStatusTimeout = $nextRempStatusTimeout;
        return $this;
    }

    /**
     * You can specify here Evercloud project secret ot serialized JWT.
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
        if ($this->_latencyDetectionInterval !== null) $result['latency_detection_interval'] = $this->_latencyDetectionInterval;
        if ($this->_maxLatency !== null) $result['max_latency'] = $this->_maxLatency;
        if ($this->_queryTimeout !== null) $result['query_timeout'] = $this->_queryTimeout;
        if ($this->_queriesProtocol !== null) $result['queries_protocol'] = $this->_queriesProtocol;
        if ($this->_firstRempStatusTimeout !== null) $result['first_remp_status_timeout'] = $this->_firstRempStatusTimeout;
        if ($this->_nextRempStatusTimeout !== null) $result['next_remp_status_timeout'] = $this->_nextRempStatusTimeout;
        if ($this->_accessKey !== null) $result['access_key'] = $this->_accessKey;
        return !empty($result) ? $result : new stdClass();
    }
}
