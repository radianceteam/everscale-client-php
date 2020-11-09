<?php

namespace TON;

use PHPUnit\Framework\TestCase;
use TON\Crypto\CryptoModule;
use TON\Crypto\KeyPair;
use TON\Crypto\ParamsOfConvertPublicKeyToTonSafeFormat;
use TON\Crypto\ParamsOfFactorize;
use TON\Crypto\ParamsOfGenerateRandomBytes;
use TON\Crypto\ParamsOfModularPower;
use TON\Crypto\ParamsOfSign;
use TON\Crypto\ParamsOfTonCrc16;
use TON\Crypto\ParamsOfVerifySignature;

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

    public function testModularPower()
    {
        $result = $this->_crypto->modularPower((new ParamsOfModularPower())
            ->setBase("0123456789ABCDEF")
            ->setExponent("0123")
            ->setModulus("01234567"));
        $this->assertNotNull($result);
        $this->assertEquals("63bfdf", $result->getModularPower());
    }

    public function testTonCrc16()
    {
        $result = $this->_crypto->tonCrc16((new ParamsOfTonCrc16())
            ->setData(base64_encode("0123456789abcdef")));
        $this->assertNotNull($result);
        $this->assertEquals(59557, $result->getCrc());
    }

    public function testGenerateRandomBytes()
    {
        $result = $this->_crypto->generateRandomBytes(
            (new ParamsOfGenerateRandomBytes())
                ->setLength(32));
        $this->assertNotNull($result);
        $this->assertEquals(44, strlen($result->getBytes()));
    }

    public function testConvertPublicKeyToTonSafeFormat()
    {
        $result = $this->_crypto->convertPublicKeyToTonSafeFormat(
            (new ParamsOfConvertPublicKeyToTonSafeFormat())
                ->setPublicKey("06117f59ade83e097e0fb33e5d29e8735bda82b3bf78a015542aaa853bb69600"));

        $this->assertNotNull($result);
        $this->assertEquals("PuYGEX9Zreg-CX4Psz5dKehzW9qCs794oBVUKqqFO7aWAOTD", $result->getTonPublicKey());
    }

    public function testGenerateRandomSignKeys()
    {
        $result = $this->_crypto->generateRandomSignKeys();
        $this->assertNotNull($result);
        $this->assertNotEmpty($result->getPublic());
        $this->assertNotEmpty($result->getSecret());
        $this->assertNotEquals($result->getPublic(), $result->getSecret());
        $this->assertEquals(64, strlen($result->getPublic()));
        $this->assertEquals(64, strlen($result->getSecret()));
    }

    public function testSign()
    {
        $result = $this->_crypto->sign((new ParamsOfSign())
            ->setUnsigned(base64_encode("Test Message"))
            ->setKeys((new KeyPair())
                ->setPublic("1869b7ef29d58026217e9cf163cbfbd0de889bdf1bf4daebf5433a312f5b8d6e")
                ->setSecret("56b6a77093d6fdf14e593f36275d872d75de5b341942376b2a08759f3cbae78f")));
        $this->assertNotNull($result);
        $this->assertEquals("+wz+QO6l1slgZS5s65BNqKcu4vz24FCJz4NSAxef9lu0jFfs8x3PzSZRC+pn5k8+aJi3xYMA3BQzglQmjK3hA1Rlc3QgTWVzc2FnZQ==",
            $result->getSigned());
        $this->assertEquals("fb0cfe40eea5d6c960652e6ceb904da8a72ee2fcf6e05089cf835203179ff65bb48c57ecf31dcfcd26510bea67e64f3e6898b7c58300dc14338254268cade103",
            $result->getSignature());
    }

    public function testVerify()
    {
        $result = $this->_crypto->verifySignature((new ParamsOfVerifySignature())
            ->setSigned("+wz+QO6l1slgZS5s65BNqKcu4vz24FCJz4NSAxef9lu0jFfs8x3PzSZRC+pn5k8+aJi3xYMA3BQzglQmjK3hA1Rlc3QgTWVzc2FnZQ==")
            ->setPublic("1869b7ef29d58026217e9cf163cbfbd0de889bdf1bf4daebf5433a312f5b8d6e"));
        $this->assertNotNull($result);
        $this->assertNotEmpty($result->getUnsigned());
        $this->assertEquals("Test Message", base64_decode($result->getUnsigned()));
    }
}