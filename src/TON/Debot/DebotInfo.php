<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class DebotInfo implements JsonSerializable
{
    private ?string $_name;
    private ?string $_version;
    private ?string $_publisher;
    private ?string $_key;
    private ?string $_author;
    private ?string $_support;
    private ?string $_hello;
    private ?string $_language;
    private ?string $_dabi;
    private ?string $_icon;
    private array $_interfaces;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_name = $dto['name'] ?? null;
        $this->_version = $dto['version'] ?? null;
        $this->_publisher = $dto['publisher'] ?? null;
        $this->_key = $dto['key'] ?? null;
        $this->_author = $dto['author'] ?? null;
        $this->_support = $dto['support'] ?? null;
        $this->_hello = $dto['hello'] ?? null;
        $this->_language = $dto['language'] ?? null;
        $this->_dabi = $dto['dabi'] ?? null;
        $this->_icon = $dto['icon'] ?? null;
        $this->_interfaces = $dto['interfaces'] ?? [];
    }

    public function getName(): ?string
    {
        return $this->_name;
    }

    public function getVersion(): ?string
    {
        return $this->_version;
    }

    public function getPublisher(): ?string
    {
        return $this->_publisher;
    }

    public function getKey(): ?string
    {
        return $this->_key;
    }

    public function getAuthor(): ?string
    {
        return $this->_author;
    }

    public function getSupport(): ?string
    {
        return $this->_support;
    }

    public function getHello(): ?string
    {
        return $this->_hello;
    }

    public function getLanguage(): ?string
    {
        return $this->_language;
    }

    public function getDabi(): ?string
    {
        return $this->_dabi;
    }

    public function getIcon(): ?string
    {
        return $this->_icon;
    }

    public function getInterfaces(): array
    {
        return $this->_interfaces;
    }

    /**
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return self
     */
    public function setVersion(?string $version): self
    {
        $this->_version = $version;
        return $this;
    }

    /**
     * @return self
     */
    public function setPublisher(?string $publisher): self
    {
        $this->_publisher = $publisher;
        return $this;
    }

    /**
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->_key = $key;
        return $this;
    }

    /**
     * @return self
     */
    public function setAuthor(?string $author): self
    {
        $this->_author = $author;
        return $this;
    }

    /**
     * @return self
     */
    public function setSupport(?string $support): self
    {
        $this->_support = $support;
        return $this;
    }

    /**
     * @return self
     */
    public function setHello(?string $hello): self
    {
        $this->_hello = $hello;
        return $this;
    }

    /**
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->_language = $language;
        return $this;
    }

    /**
     * @return self
     */
    public function setDabi(?string $dabi): self
    {
        $this->_dabi = $dabi;
        return $this;
    }

    /**
     * @return self
     */
    public function setIcon(?string $icon): self
    {
        $this->_icon = $icon;
        return $this;
    }

    /**
     * @return self
     */
    public function setInterfaces(array $interfaces): self
    {
        $this->_interfaces = $interfaces;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_name !== null) $result['name'] = $this->_name;
        if ($this->_version !== null) $result['version'] = $this->_version;
        if ($this->_publisher !== null) $result['publisher'] = $this->_publisher;
        if ($this->_key !== null) $result['key'] = $this->_key;
        if ($this->_author !== null) $result['author'] = $this->_author;
        if ($this->_support !== null) $result['support'] = $this->_support;
        if ($this->_hello !== null) $result['hello'] = $this->_hello;
        if ($this->_language !== null) $result['language'] = $this->_language;
        if ($this->_dabi !== null) $result['dabi'] = $this->_dabi;
        if ($this->_icon !== null) $result['icon'] = $this->_icon;
        if ($this->_interfaces !== null) $result['interfaces'] = $this->_interfaces;
        return !empty($result) ? $result : new stdClass();
    }
}
