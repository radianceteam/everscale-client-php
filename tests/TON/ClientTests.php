<?php declare(strict_types=1);

namespace TON;

use PHPUnit\Framework\TestCase;
use TON\Client\ClientModule;

class ClientTests extends TestCase
{
    private TonContext $_context;
    private ClientModule $_client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_context = new TonContext();
        $this->_client = new ClientModule($this->_context);
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

    public function testGetApiReference()
    {
        $result = $this->_client->getApiReference();
        $this->assertNotNull($result);
        $this->assertNotEmpty($result);
    }

    public function testBuildInfo()
    {
        $result = $this->_client->buildInfo();
        $this->assertNotNull($result);
    }
}
