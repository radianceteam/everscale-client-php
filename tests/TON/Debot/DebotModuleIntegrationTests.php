<?php declare(strict_types=1);

namespace TON\Debot;

use TON\Abi\Abi_Contract;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer_Keys;
use TON\AbstractIntegrationTest;
use TON\Crypto\KeyPair;
use TON\TestClient;
use function bin2hex;
use function json_encode;

class DebotModuleIntegrationTests extends AbstractIntegrationTest
{
    private static string $debot_addr;
    private static string $target_addr;
    private static KeyPair $keys;
    private static TestBrowser $browser;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        self::$keys = self::$client->crypto()->generateRandomSignKeys();

        [$target_abi, $target_tvc] = TestClient::package('testDebotTarget');
        [$debot_abi, $debot_tvc] = TestClient::package('testDebot');

        $target_deploy_params = (new ParamsOfEncodeMessage())
            ->setAbi((new Abi_Contract())->setValue($target_abi))
            ->setDeploySet((new DeploySet())
                ->setTvc($target_tvc))
            ->setSigner((new Signer_Keys())->setKeys(self::$keys))
            ->setCallSet((new CallSet())->setFunctionName('constructor'));

        self::$target_addr = self::$client->abi()
            ->encodeMessage($target_deploy_params)
            ->getAddress();

        TestClient::deployWithGiver(self::$client, $target_deploy_params);

        self::$debot_addr = TestClient::deployWithGiver(self::$client, (new ParamsOfEncodeMessage())
            ->setAbi((new Abi_Contract())->setValue($debot_abi))
            ->setDeploySet((new DeploySet())
                ->setTvc($debot_tvc))
            ->setSigner((new Signer_Keys())->setKeys(self::$keys))
            ->setCallSet((new CallSet())
                ->setFunctionName('constructor')
                ->setInput([
                    'debotAbi' => bin2hex(json_encode($debot_abi)),
                    'targetAbi' => bin2hex(json_encode($target_abi)),
                    'targetAddr' => self::$target_addr
                ])));

        self::$browser = new TestBrowser(self::$client, self::$logger);
    }

    public function testBin2Hex()
    {
        $this->assertEquals('48656c6c6f20776f726c6421', bin2hex('Hello world!'));
    }

    public function testDebotGoto()
    {
        self::$browser->execute(
            self::$debot_addr,
            self::$keys,
            [
                new DebotStep(1, [], ["Test Goto Action"]),
                new DebotStep(1, [], ["Debot Tests"]),
                new DebotStep(8, [], [])
            ]
        );
    }

    public function testDebotPrint()
    {
        $target_addr = self::$target_addr;
        self::$browser->execute(
            self::$debot_addr,
            self::$keys,
            [
                new DebotStep(2, [], ["Test Print Action", "test2: instant print", "test instant print"]),
                new DebotStep(1, [], ["test simple print"]),
                new DebotStep(2, [], ["integer=1,addr=${target_addr},string=test_string_1"]),
                new DebotStep(3, [], ["Debot Tests"]),
                new DebotStep(8, [], [])
            ]
        );
    }

    public function testDebotRun()
    {
        self::$browser->execute(
            self::$debot_addr,
            self::$keys,
            [
                new DebotStep(3, ["-1:1111111111111111111111111111111111111111111111111111111111111111"], ["Test Run Action", "test1: instant run 1", "test2: instant run 2"]),
                new DebotStep(1, ["hello"], []),
                new DebotStep(2, [], ["integer=2,addr=-1:1111111111111111111111111111111111111111111111111111111111111111,string=hello"]),
                new DebotStep(3, [], ["Debot Tests"]),
                new DebotStep(8, [], [])
            ]
        );
    }

    public function testDebotRunMethod()
    {
        self::$browser->execute(
            self::$debot_addr,
            self::$keys,
            [
                new DebotStep(4, [], ["Test Run Method Action"]),
                new DebotStep(1, [], []),
                new DebotStep(2, [], ["data=64"]),
                new DebotStep(3, [], ["Debot Tests"]),
                new DebotStep(8, [], [])
            ]
        );
    }

    public function testDebotSendMSg()
    {
        self::$browser->execute(
            self::$debot_addr,
            self::$keys,
            [
                new DebotStep(5, [], ["Test Send Msg Action"]),
                new DebotStep(1, [], ["Sending message {}", "Transaction succeeded."]),
                new DebotStep(2, [], []),
                new DebotStep(3, [], ["data=100"]),
                new DebotStep(4, [], ["Debot Tests"]),
                new DebotStep(8, [], [])
            ]
        );
    }

    public function testDebotInvokeDebot()
    {
        self::$browser->execute(
            self::$debot_addr,
            self::$keys,
            [
                new DebotStep(6, [self::$debot_addr], ["Test Invoke Debot Action", "enter debot address:"]),
                new DebotStep(1, [], [], [[new DebotStep(1, [], ["Print test string", "Debot is invoked"])]]),
                new DebotStep(2, [], ["Debot Tests"]),
                new DebotStep(8, [], [])
            ]
        );
    }
}