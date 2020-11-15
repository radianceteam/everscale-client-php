<?php declare(strict_types=1);

namespace TON;

use PHPUnit\Framework\TestCase;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\FunctionHeader;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Crypto\KeyPair;

class AbiTests /*extends TestCase*/
{
    private TonContext $_context;

    protected function setUp(): void
    {
//        parent::setUp();
        $this->_context = new TonContext();
    }

    protected function tearDown(): void
    {
//        parent::tearDown();
        $this->_context->destroy();
    }

    public function testEncodeMessage_external()
    {
        [$abi, $tvc] = TestClient::package('Events', 2);

        $keys = new KeyPair([
            "public" => "4c7c408ff1ddebb8d6405ee979c716a14fdd6cc08124107a61d3c25597099499",
            "secret" => "cc8929d635719612a9478b9cd17675a39cfad52d8959e8a177389b8c0b9122a7"
        ]);

        $time = 1599458364291;
        $expire = 1599458404;

//        $msg = new ParamsOfEncodeMessage([
//            "abi" => ["type" => "Handle", "value" => 0],
//            "signer" => [
//                "type" => "Keys",
//                "keys" => [
//                    "public" => $keys->getPublic(),
//                    "secret" => $keys->getSecret()
//                ]
//            ]
//        ]);

//        $deploy_params = ;
    }

//    private static function getDeployParams(Signer $signer) {
//        (new ParamsOfEncodeMessage())
//            ->setAbi($abi)
//            ->setDeploySet((new DeploySet())
//                ->setTvc($tvc))
//            ->setCallSet((new CallSet())
//                ->setFunctionName("constructor")
//                ->setHeader((new FunctionHeader())->
//                setPubkey())
//    }


}