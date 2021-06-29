<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class EncryptionBoxInfo implements JsonSerializable
{
    private ?string $_hdpath;
    private ?string $_algorithm;
    private $_options;
    private $_public;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_hdpath = $dto['hdpath'] ?? null;
        $this->_algorithm = $dto['algorithm'] ?? null;
        $this->_options = $dto['options'] ?? null;
        $this->_public = $dto['public'] ?? null;
    }

    public function getHdpath(): ?string
    {
        return $this->_hdpath;
    }

    public function getAlgorithm(): ?string
    {
        return $this->_algorithm;
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function getPublic()
    {
        return $this->_public;
    }

    /**
     * @return self
     */
    public function setHdpath(?string $hdpath): self
    {
        $this->_hdpath = $hdpath;
        return $this;
    }

    /**
     * @return self
     */
    public function setAlgorithm(?string $algorithm): self
    {
        $this->_algorithm = $algorithm;
        return $this;
    }

    /**
     * @return self
     */
    public function setOptions($options): self
    {
        $this->_options = $options;
        return $this;
    }

    /**
     * @return self
     */
    public function setPublic($public): self
    {
        $this->_public = $public;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_hdpath !== null) $result['hdpath'] = $this->_hdpath;
        if ($this->_algorithm !== null) $result['algorithm'] = $this->_algorithm;
        if ($this->_options !== null) $result['options'] = $this->_options;
        if ($this->_public !== null) $result['public'] = $this->_public;
        return !empty($result) ? $result : new stdClass();
    }
}
