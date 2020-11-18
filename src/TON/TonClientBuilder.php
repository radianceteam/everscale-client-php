<?php

namespace TON;

use JsonSerializable;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class TonClientBuilder
{
    private ?JsonSerializable $_config = null;
    private ?LoggerInterface $_logger;

    private function __construct()
    {
        $this->_logger = new NullLogger();
    }

    public function withConfig(JsonSerializable $config): self
    {
        $this->_config = $config;
        return $this;
    }

    public function withLogger(LoggerInterface $logger): self
    {
        $this->_logger = $logger;
        return $this;
    }

    public function build(): TonClientInterface
    {
        return new TonClient($this->_config, $this->_logger);
    }

    public static function create(): self
    {
        return new TonClientBuilder();
    }
}