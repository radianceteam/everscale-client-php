<?php

namespace TON;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class ConsoleLogger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = array())
    {
        if ($context) {
            $serialized = json_encode($context);
            echo "[$level] $message (${serialized})\n";
        } else {
            echo "[$level] $message\n";
        }
    }
}