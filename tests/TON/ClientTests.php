<?php

namespace TON;

use PHPUnit\Framework\TestCase;
use TON\Client\ClientImpl;
use TON\Client\ClientInterface;

class ClientTests extends TestCase
{
    private TonContext $_context;
    private ClientInterface $_client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_context = new TonContext();
        $this->_client = new ClientImpl($this->_context);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->_context->destroy();
    }

    public function testVersion()
    {
        $result = $this->_client->version();
        $this->assertNotNull($result);
        $this->assertMatchesRegularExpression('/^\d+\.\d+\.\d+$/', $result->getVersion());
    }
}
