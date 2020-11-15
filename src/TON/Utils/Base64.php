<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use JsonSerializable;

class Base64 extends AddressStringFormat implements JsonSerializable
{
    private bool $_url;
    private bool $_test;
    private bool $_bounce;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_url = $dto['url'] ?? false;
        $this->_test = $dto['test'] ?? false;
        $this->_bounce = $dto['bounce'] ?? false;
    }

    public function isUrl(): bool
    {
        return $this->_url;
    }

    public function isTest(): bool
    {
        return $this->_test;
    }

    public function isBounce(): bool
    {
        return $this->_bounce;
    }

    public function setUrl(bool $url): self
    {
        $this->_url = $url;
        return $this;
    }

    public function setTest(bool $test): self
    {
        $this->_test = $test;
        return $this;
    }

    public function setBounce(bool $bounce): self
    {
        $this->_bounce = $bounce;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Base64'];
        if ($this->_url !== null) $result['url'] = $this->_url;
        if ($this->_test !== null) $result['test'] = $this->_test;
        if ($this->_bounce !== null) $result['bounce'] = $this->_bounce;
        return $result;
    }
}
