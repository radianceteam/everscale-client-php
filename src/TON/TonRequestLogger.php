<?php

namespace TON;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class TonRequestLogger extends AbstractLogger
{
    private string $_functionName;
    private $_resource;
    private LoggerInterface $_logger;

    /**
     * TonRequestLogger constructor.
     * @param string $functionName
     * @param resource $resource Request resource handle.
     * @param LoggerInterface $logger
     */
    public function __construct(string $functionName, $resource, LoggerInterface $logger)
    {
        $this->_functionName = $functionName;
        $this->_resource = $resource;
        $this->_logger = $logger;
    }

    public function log($level, $message, array $context = array())
    {
        $this->_logger->log($level, "{$this->_functionName} [{$this->_resource}]: ${message}", $context);
    }
}