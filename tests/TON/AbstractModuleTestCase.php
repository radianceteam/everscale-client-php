<?php

namespace TON;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

abstract class AbstractModuleTestCase extends TestCase
{
    protected TonContext $_context;

    protected function setUp(): void
    {
        parent::setUp();
        $logger = new Logger((new ReflectionClass($this))->getShortName());
        $logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
        $this->_context = new TonContext();
        $this->_context->setLogger($logger);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->_context->destroy();
    }
}