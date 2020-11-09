<?php

namespace TON;

use PHPUnit\Framework\TestCase;
use TON\Crypto\CryptoModule;
use TON\Crypto\ParamsOfFactorize;

class CryptoTests extends TestCase
{
    private TonContext $_context;
    private CryptoModule $_crypto;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_context = new TonContext();
        $this->_crypto = new CryptoModule($this->_context);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->_context->destroy();
    }

    public function testFactorize()
    {
        $result = $this->_crypto->factorize((new ParamsOfFactorize())
            ->setComposite("17ED48941A08F981"));
        $this->assertNotNull($result);
        $this->assertEquals(["494C553B", "53911073"], $result->getFactors());

    }


}