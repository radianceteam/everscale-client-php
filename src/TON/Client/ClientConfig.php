<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class ClientConfig implements JsonSerializable
{
    private ?NetworkConfig $_network;
    private ?CryptoConfig $_crypto;
    private ?AbiConfig $_abi;
    private ?BocConfig $_boc;
    private ?ProofsConfig $_proofs;
    private ?string $_localStoragePath;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_network = isset($dto['network']) ? new NetworkConfig($dto['network']) : null;
        $this->_crypto = isset($dto['crypto']) ? new CryptoConfig($dto['crypto']) : null;
        $this->_abi = isset($dto['abi']) ? new AbiConfig($dto['abi']) : null;
        $this->_boc = isset($dto['boc']) ? new BocConfig($dto['boc']) : null;
        $this->_proofs = isset($dto['proofs']) ? new ProofsConfig($dto['proofs']) : null;
        $this->_localStoragePath = $dto['local_storage_path'] ?? null;
    }

    public function getNetwork(): ?NetworkConfig
    {
        return $this->_network;
    }

    public function getCrypto(): ?CryptoConfig
    {
        return $this->_crypto;
    }

    public function getAbi(): ?AbiConfig
    {
        return $this->_abi;
    }

    public function getBoc(): ?BocConfig
    {
        return $this->_boc;
    }

    public function getProofs(): ?ProofsConfig
    {
        return $this->_proofs;
    }

    public function getLocalStoragePath(): ?string
    {
        return $this->_localStoragePath;
    }

    /**
     * @return self
     */
    public function setNetwork(?NetworkConfig $network): self
    {
        $this->_network = $network;
        return $this;
    }

    /**
     * @return self
     */
    public function setCrypto(?CryptoConfig $crypto): self
    {
        $this->_crypto = $crypto;
        return $this;
    }

    /**
     * @return self
     */
    public function setAbi(?AbiConfig $abi): self
    {
        $this->_abi = $abi;
        return $this;
    }

    /**
     * @return self
     */
    public function setBoc(?BocConfig $boc): self
    {
        $this->_boc = $boc;
        return $this;
    }

    /**
     * @return self
     */
    public function setProofs(?ProofsConfig $proofs): self
    {
        $this->_proofs = $proofs;
        return $this;
    }

    /**
     * @return self
     */
    public function setLocalStoragePath(?string $localStoragePath): self
    {
        $this->_localStoragePath = $localStoragePath;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_network !== null) $result['network'] = $this->_network;
        if ($this->_crypto !== null) $result['crypto'] = $this->_crypto;
        if ($this->_abi !== null) $result['abi'] = $this->_abi;
        if ($this->_boc !== null) $result['boc'] = $this->_boc;
        if ($this->_proofs !== null) $result['proofs'] = $this->_proofs;
        if ($this->_localStoragePath !== null) $result['local_storage_path'] = $this->_localStoragePath;
        return !empty($result) ? $result : new stdClass();
    }
}
