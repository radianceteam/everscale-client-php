<?php declare(strict_types=1);

namespace TON\Abi;

use TON\AbstractModuleTestCase;
use TON\Boc\BocModule;
use TON\Boc\ParamsOfGetCodeFromTvc;
use TON\Boc\ParamsOfParse;
use TON\Crypto\CryptoModule;
use TON\Crypto\KeyPair;
use TON\Crypto\ParamsOfNaclSign;
use TON\Crypto\ParamsOfNaclSignKeyPairFromSecret;
use TON\TestClient;

class AbiModuleTests extends AbstractModuleTestCase
{
    private AbiContract $_abi;
    private string $_tvc;
    private KeyPair $_keys;
    private AbiModule $_module;
    private CryptoModule $_crypto;

    protected function setUp(): void
    {
        parent::setUp();

        [$this->_abi, $this->_tvc] = TestClient::package('Events', 2);

        $this->_keys = new KeyPair([
            "public" => "4c7c408ff1ddebb8d6405ee979c716a14fdd6cc08124107a61d3c25597099499",
            "secret" => "cc8929d635719612a9478b9cd17675a39cfad52d8959e8a177389b8c0b9122a7"
        ]);

        $this->_module = new AbiModule($this->_context);
        $this->_crypto = new CryptoModule($this->_context);
    }

    public function testEncodeMessage_deploy_external()
    {
        $unsigned = $this->_module->encodeMessage(
            self::getDeployParams(
                (new Signer_External())->setPublicKey($this->_keys->getPublic()),
                $this->_keys->getPublic()));

        $this->assertEquals(
            "te6ccgECFwEAA2gAAqeIAAt9aqvShfTon7Lei1PVOhUEkEEZQkhDKPgNyzeTL6YSEZTHxAj/Hd67jWQF7peccWoU/dbMCBJBB6YdPCVZcJlJkAAAF0ZyXLg19VzGRotV8/gGAQEBwAICA88gBQMBAd4EAAPQIABB2mPiBH+O713GsgL3S844tQp+62YECSCD0w6eEqy4TKTMAib/APSkICLAAZL0oOGK7VNYMPShCQcBCvSkIPShCAAAAgEgDAoByP9/Ie1E0CDXScIBjhDT/9M/0wDRf/hh+Gb4Y/hijhj0BXABgED0DvK91wv/+GJw+GNw+GZ/+GHi0wABjh2BAgDXGCD5AQHTAAGU0/8DAZMC+ELiIPhl+RDyqJXTAAHyeuLTPwELAGqOHvhDIbkgnzAg+COBA+iogggbd0Cgud6S+GPggDTyNNjTHwH4I7zyudMfAfAB+EdukvI83gIBIBINAgEgDw4AvbqLVfP/hBbo417UTQINdJwgGOENP/0z/TANF/+GH4Zvhj+GKOGPQFcAGAQPQO8r3XC//4YnD4Y3D4Zn/4YeLe+Ebyc3H4ZtH4APhCyMv/+EPPCz/4Rs8LAMntVH/4Z4AgEgERAA5biABrW/CC3Rwn2omhp/+mf6YBov/ww/DN8Mfwxb30gyupo6H0gb+j8IpA3SRg4b3whXXlwMnwAZGT9ghBkZ8KEZ0aCBAfQAAAAAAAAAAAAAAAAACBni2TAgEB9gBh8IWRl//wh54Wf/CNnhYBk9qo//DPAAxbmTwqLfCC3Rwn2omhp/+mf6YBov/ww/DN8Mfwxb2uG/8rqaOhp/+/o/ABkRe4AAAAAAAAAAAAAAAAIZ4tnwOfI48sYvRDnhf/kuP2AGHwhZGX//CHnhZ/8I2eFgGT2qj/8M8AIBSBYTAQm4t8WCUBQB/PhBbo4T7UTQ0//TP9MA0X/4Yfhm+GP4Yt7XDf+V1NHQ0//f0fgAyIvcAAAAAAAAAAAAAAAAEM8Wz4HPkceWMXohzwv/yXH7AMiL3AAAAAAAAAAAAAAAABDPFs+Bz5JW+LBKIc8L/8lx+wAw+ELIy//4Q88LP/hGzwsAye1UfxUABPhnAHLccCLQ1gIx0gAw3CHHAJLyO+Ah1w0fkvI84VMRkvI74cEEIoIQ/////byxkvI84AHwAfhHbpLyPN4=",
            $unsigned->getMessage());

        $this->assertEquals(
            "KCGM36iTYuCYynk+Jnemis+mcwi3RFCke95i7l96s4Q=",
            $unsigned->getDataToSign());
    }

    public function testAttachSignature_deployed()
    {
        $signature = $this->signDetached("KCGM36iTYuCYynk+Jnemis+mcwi3RFCke95i7l96s4Q=");

        $this->assertEquals(
            "6272357bccb601db2b821cb0f5f564ab519212d242cf31961fe9a3c50a30b236012618296b4f769355c0e9567cd25b366f3c037435c498c82e5305622adbc70e",
            $signature);

        $signed = $this->_module->attachSignature((new ParamsOfAttachSignature())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setPublicKey($this->_keys->getPublic())
            ->setMessage("te6ccgECFwEAA2gAAqeIAAt9aqvShfTon7Lei1PVOhUEkEEZQkhDKPgNyzeTL6YSEZTHxAj/Hd67jWQF7peccWoU/dbMCBJBB6YdPCVZcJlJkAAAF0ZyXLg19VzGRotV8/gGAQEBwAICA88gBQMBAd4EAAPQIABB2mPiBH+O713GsgL3S844tQp+62YECSCD0w6eEqy4TKTMAib/APSkICLAAZL0oOGK7VNYMPShCQcBCvSkIPShCAAAAgEgDAoByP9/Ie1E0CDXScIBjhDT/9M/0wDRf/hh+Gb4Y/hijhj0BXABgED0DvK91wv/+GJw+GNw+GZ/+GHi0wABjh2BAgDXGCD5AQHTAAGU0/8DAZMC+ELiIPhl+RDyqJXTAAHyeuLTPwELAGqOHvhDIbkgnzAg+COBA+iogggbd0Cgud6S+GPggDTyNNjTHwH4I7zyudMfAfAB+EdukvI83gIBIBINAgEgDw4AvbqLVfP/hBbo417UTQINdJwgGOENP/0z/TANF/+GH4Zvhj+GKOGPQFcAGAQPQO8r3XC//4YnD4Y3D4Zn/4YeLe+Ebyc3H4ZtH4APhCyMv/+EPPCz/4Rs8LAMntVH/4Z4AgEgERAA5biABrW/CC3Rwn2omhp/+mf6YBov/ww/DN8Mfwxb30gyupo6H0gb+j8IpA3SRg4b3whXXlwMnwAZGT9ghBkZ8KEZ0aCBAfQAAAAAAAAAAAAAAAAACBni2TAgEB9gBh8IWRl//wh54Wf/CNnhYBk9qo//DPAAxbmTwqLfCC3Rwn2omhp/+mf6YBov/ww/DN8Mfwxb2uG/8rqaOhp/+/o/ABkRe4AAAAAAAAAAAAAAAAIZ4tnwOfI48sYvRDnhf/kuP2AGHwhZGX//CHnhZ/8I2eFgGT2qj/8M8AIBSBYTAQm4t8WCUBQB/PhBbo4T7UTQ0//TP9MA0X/4Yfhm+GP4Yt7XDf+V1NHQ0//f0fgAyIvcAAAAAAAAAAAAAAAAEM8Wz4HPkceWMXohzwv/yXH7AMiL3AAAAAAAAAAAAAAAABDPFs+Bz5JW+LBKIc8L/8lx+wAw+ELIy//4Q88LP/hGzwsAye1UfxUABPhnAHLccCLQ1gIx0gAw3CHHAJLyO+Ah1w0fkvI84VMRkvI74cEEIoIQ/////byxkvI84AHwAfhHbpLyPN4=")
            ->setSignature($signature));

        $this->assertEquals(
            "te6ccgECGAEAA6wAA0eIAAt9aqvShfTon7Lei1PVOhUEkEEZQkhDKPgNyzeTL6YSEbAHAgEA4bE5Gr3mWwDtlcEOWHr6slWoyQlpIWeYyw/00eKFGFkbAJMMFLWnu0mq4HSrPmktmzeeAboa4kxkFymCsRVt44dTHxAj/Hd67jWQF7peccWoU/dbMCBJBB6YdPCVZcJlJkAAAF0ZyXLg19VzGRotV8/gAQHAAwIDzyAGBAEB3gUAA9AgAEHaY+IEf47vXcayAvdLzji1Cn7rZgQJIIPTDp4SrLhMpMwCJv8A9KQgIsABkvSg4YrtU1gw9KEKCAEK9KQg9KEJAAACASANCwHI/38h7UTQINdJwgGOENP/0z/TANF/+GH4Zvhj+GKOGPQFcAGAQPQO8r3XC//4YnD4Y3D4Zn/4YeLTAAGOHYECANcYIPkBAdMAAZTT/wMBkwL4QuIg+GX5EPKoldMAAfJ64tM/AQwAao4e+EMhuSCfMCD4I4ED6KiCCBt3QKC53pL4Y+CANPI02NMfAfgjvPK50x8B8AH4R26S8jzeAgEgEw4CASAQDwC9uotV8/+EFujjXtRNAg10nCAY4Q0//TP9MA0X/4Yfhm+GP4Yo4Y9AVwAYBA9A7yvdcL//hicPhjcPhmf/hh4t74RvJzcfhm0fgA+ELIy//4Q88LP/hGzwsAye1Uf/hngCASASEQDluIAGtb8ILdHCfaiaGn/6Z/pgGi//DD8M3wx/DFvfSDK6mjofSBv6PwikDdJGDhvfCFdeXAyfABkZP2CEGRnwoRnRoIEB9AAAAAAAAAAAAAAAAAAIGeLZMCAQH2AGHwhZGX//CHnhZ/8I2eFgGT2qj/8M8ADFuZPCot8ILdHCfaiaGn/6Z/pgGi//DD8M3wx/DFva4b/yupo6Gn/7+j8AGRF7gAAAAAAAAAAAAAAAAhni2fA58jjyxi9EOeF/+S4/YAYfCFkZf/8IeeFn/wjZ4WAZPaqP/wzwAgFIFxQBCbi3xYJQFQH8+EFujhPtRNDT/9M/0wDRf/hh+Gb4Y/hi3tcN/5XU0dDT/9/R+ADIi9wAAAAAAAAAAAAAAAAQzxbPgc+Rx5YxeiHPC//JcfsAyIvcAAAAAAAAAAAAAAAAEM8Wz4HPklb4sEohzwv/yXH7ADD4QsjL//hDzws/+EbPCwDJ7VR/FgAE+GcActxwItDWAjHSADDcIccAkvI74CHXDR+S8jzhUxGS8jvhwQQighD////9vLGS8jzgAfAB+EdukvI83g==",
            $signed->getMessage());
    }

    public function testEncodeMessage_deploy_keys()
    {
        $signing = (new Signer_Keys())->setKeys($this->_keys);
        $params = self::getDeployParams($signing, $this->_keys->getPublic());
        $unsigned = $this->_module->encodeMessage($params);

        $this->assertEquals(
            "te6ccgECGAEAA6wAA0eIAAt9aqvShfTon7Lei1PVOhUEkEEZQkhDKPgNyzeTL6YSEbAHAgEA4bE5Gr3mWwDtlcEOWHr6slWoyQlpIWeYyw/00eKFGFkbAJMMFLWnu0mq4HSrPmktmzeeAboa4kxkFymCsRVt44dTHxAj/Hd67jWQF7peccWoU/dbMCBJBB6YdPCVZcJlJkAAAF0ZyXLg19VzGRotV8/gAQHAAwIDzyAGBAEB3gUAA9AgAEHaY+IEf47vXcayAvdLzji1Cn7rZgQJIIPTDp4SrLhMpMwCJv8A9KQgIsABkvSg4YrtU1gw9KEKCAEK9KQg9KEJAAACASANCwHI/38h7UTQINdJwgGOENP/0z/TANF/+GH4Zvhj+GKOGPQFcAGAQPQO8r3XC//4YnD4Y3D4Zn/4YeLTAAGOHYECANcYIPkBAdMAAZTT/wMBkwL4QuIg+GX5EPKoldMAAfJ64tM/AQwAao4e+EMhuSCfMCD4I4ED6KiCCBt3QKC53pL4Y+CANPI02NMfAfgjvPK50x8B8AH4R26S8jzeAgEgEw4CASAQDwC9uotV8/+EFujjXtRNAg10nCAY4Q0//TP9MA0X/4Yfhm+GP4Yo4Y9AVwAYBA9A7yvdcL//hicPhjcPhmf/hh4t74RvJzcfhm0fgA+ELIy//4Q88LP/hGzwsAye1Uf/hngCASASEQDluIAGtb8ILdHCfaiaGn/6Z/pgGi//DD8M3wx/DFvfSDK6mjofSBv6PwikDdJGDhvfCFdeXAyfABkZP2CEGRnwoRnRoIEB9AAAAAAAAAAAAAAAAAAIGeLZMCAQH2AGHwhZGX//CHnhZ/8I2eFgGT2qj/8M8ADFuZPCot8ILdHCfaiaGn/6Z/pgGi//DD8M3wx/DFva4b/yupo6Gn/7+j8AGRF7gAAAAAAAAAAAAAAAAhni2fA58jjyxi9EOeF/+S4/YAYfCFkZf/8IeeFn/wjZ4WAZPaqP/wzwAgFIFxQBCbi3xYJQFQH8+EFujhPtRNDT/9M/0wDRf/hh+Gb4Y/hi3tcN/5XU0dDT/9/R+ADIi9wAAAAAAAAAAAAAAAAQzxbPgc+Rx5YxeiHPC//JcfsAyIvcAAAAAAAAAAAAAAAAEM8Wz4HPklb4sEohzwv/yXH7ADD4QsjL//hDzws/+EbPCwDJ7VR/FgAE+GcActxwItDWAjHSADDcIccAkvI74CHXDR+S8jzhUxGS8jvhwQQighD////9vLGS8jzgAfAB+EdukvI83g==",
            $unsigned->getMessage());
    }

    public function testEncodeMessage_run_external()
    {
        $unsigned = $this->_module->encodeMessage(
            self::getRunParams((new Signer_External())
                ->setPublicKey($this->_keys->getPublic())));

        $this->assertEquals(
            "te6ccgEBAgEAeAABpYgAC31qq9KF9Oifst6LU9U6FQSQQRlCSEMo+A3LN5MvphIFMfECP8d3ruNZAXul5xxahT91swIEkEHph08JVlwmUmQAAAXRnJcuDX1XMZBW+LBKAQBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=",
            $unsigned->getMessage());

        $this->assertEquals(
            "i4Hs3PB12QA9UBFbOIpkG3JerHHqjm4LgvF4MA7TDsY=",
            $unsigned->getDataToSign());
    }

    public function testAttachSignature_run()
    {
        $signature = $this->signDetached("i4Hs3PB12QA9UBFbOIpkG3JerHHqjm4LgvF4MA7TDsY=");

        $this->assertEquals(
            "5bbfb7f184f2cb5f019400b9cd497eeaa41f3d5885619e9f7d4fab8dd695f4b3a02159a1422996c1dd7d1be67898bc79c6adba6c65a18101ac5f0a2a2bb8910b",
            $signature);

        $signed = $this->_module->attachSignature((new ParamsOfAttachSignature())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setPublicKey($this->_keys->getPublic())
            ->setMessage("te6ccgEBAgEAeAABpYgAC31qq9KF9Oifst6LU9U6FQSQQRlCSEMo+A3LN5MvphIFMfECP8d3ruNZAXul5xxahT91swIEkEHph08JVlwmUmQAAAXRnJcuDX1XMZBW+LBKAQBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=")
            ->setSignature($signature));

        $this->assertEquals(
            "te6ccgEBAwEAvAABRYgAC31qq9KF9Oifst6LU9U6FQSQQRlCSEMo+A3LN5MvphIMAQHhrd/b+MJ5Za+AygBc5qS/dVIPnqxCsM9PvqfVxutK+lnQEKzQoRTLYO6+jfM8TF4841bdNjLQwIDWL4UVFdxIhdMfECP8d3ruNZAXul5xxahT91swIEkEHph08JVlwmUmQAAAXRnJcuDX1XMZBW+LBKACAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==",
            $signed->getMessage());
    }

    public function testEncodeMessage_run_keys()
    {
        $signed = $this->_module->encodeMessage(
            self::getRunParams((new Signer_Keys())
                ->setKeys($this->_keys)));

        $this->assertEquals(
            "te6ccgEBAwEAvAABRYgAC31qq9KF9Oifst6LU9U6FQSQQRlCSEMo+A3LN5MvphIMAQHhrd/b+MJ5Za+AygBc5qS/dVIPnqxCsM9PvqfVxutK+lnQEKzQoRTLYO6+jfM8TF4841bdNjLQwIDWL4UVFdxIhdMfECP8d3ruNZAXul5xxahT91swIEkEHph08JVlwmUmQAAAXRnJcuDX1XMZBW+LBKACAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==",
            $signed->getMessage());
    }

    public function testEncodeMessage_run_none()
    {
        $signed = $this->_module->encodeMessage(
            self::getRunParams(new Signer_None()));

        $this->assertEquals(
            "te6ccgEBAQEAVQAApYgAC31qq9KF9Oifst6LU9U6FQSQQRlCSEMo+A3LN5MvphIAAAAC6M5Llwa+q5jIK3xYJAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB",
            $signed->getMessage());
    }

    public function testEncodeMessageBody()
    {
        $signed = $this->_module->encodeMessageBody((new ParamsOfEncodeMessageBody())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setIsInternal(false)
            ->setCallSet((new CallSet())
                ->setFunctionName("returnValue")
                ->setHeader((new FunctionHeader())
                    ->setTime(1599458364291)
                    ->setExpire(1599458404))
                ->setInput(["id" => "0"]))
            ->setSigner((new Signer_External())
                ->setPublicKey($this->_keys->getPublic())));

        $this->assertNotNull($signed);
        $this->assertEquals("te6ccgEBAgEAVgABYaY+IEf47vXcayAvdLzji1Cn7rZgQJIIPTDp4SrLhMpMgAAAujOS5cGvquYyCt8WCUABAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==",
            $signed->getBody());
    }

    public function testAsyncEncodeMessageBody()
    {
        $signed = $this->_module->async()->encodeMessageBodyAsync((new ParamsOfEncodeMessageBody())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setIsInternal(false)
            ->setCallSet((new CallSet())
                ->setFunctionName("returnValue")
                ->setHeader((new FunctionHeader())
                    ->setTime(1599458364291)
                    ->setExpire(1599458404))
                ->setInput(["id" => "0"]))
            ->setSigner((new Signer_External())
                ->setPublicKey($this->_keys->getPublic())))
            ->await();

        $this->assertNotNull($signed);
        $this->assertEquals("te6ccgEBAgEAVgABYaY+IEf47vXcayAvdLzji1Cn7rZgQJIIPTDp4SrLhMpMgAAAujOS5cGvquYyCt8WCUABAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==",
            $signed->getBody());

    }

    public function testDecodeMessage_returnValue()
    {
        $result = $this->_module->decodeMessage((new ParamsOfDecodeMessage())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setMessage("te6ccgEBAwEAvAABRYgAC31qq9KF9Oifst6LU9U6FQSQQRlCSEMo+A3LN5MvphIMAQHhrd/b+MJ5Za+AygBc5qS/dVIPnqxCsM9PvqfVxutK+lnQEKzQoRTLYO6+jfM8TF4841bdNjLQwIDWL4UVFdxIhdMfECP8d3ruNZAXul5xxahT91swIEkEHph08JVlwmUmQAAAXRnJcuDX1XMZBW+LBKACAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=="));

        $this->assertEquals(MessageBodyType::Input, $result->getBodyType());
        $this->assertEquals("returnValue", $result->getName());
        $this->assertEquals(["id" => "0x0000000000000000000000000000000000000000000000000000000000000000"], $result->getValue());

        $header = $result->getHeader();
        $this->assertNotNull($header);
        $this->assertEquals(1599458404, $header->getExpire());
        $this->assertEquals(1599458364291, $header->getTime());
        $this->assertEquals("4c7c408ff1ddebb8d6405ee979c716a14fdd6cc08124107a61d3c25597099499", $header->getPubkey());
    }

    public function testDecodeMessage_event()
    {
        $result = $this->_module->decodeMessage((new ParamsOfDecodeMessage())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setMessage("te6ccgEBAQEAVQAApeACvg5/pmQpY4m61HmJ0ne+zjHJu3MNG8rJxUDLbHKBu/AAAAAAAAAMJL6z6ro48sYvAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABA"));

        $this->assertEquals(MessageBodyType::Event, $result->getBodyType());
        $this->assertEquals("EventThrown", $result->getName());
        $this->assertEquals(["id" => "0x0000000000000000000000000000000000000000000000000000000000000000"], $result->getValue());
        $this->assertNull($result->getHeader());
    }

    public function testDecodeMessageBody()
    {
        $result = $this->_module->decodeMessageBody((new ParamsOfDecodeMessageBody())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setBody("te6ccgEBAgEAlgAB4a3f2/jCeWWvgMoAXOakv3VSD56sQrDPT76n1cbrSvpZ0BCs0KEUy2Duvo3zPExePONW3TYy0MCA1i+FFRXcSIXTHxAj/Hd67jWQF7peccWoU/dbMCBJBB6YdPCVZcJlJkAAAF0ZyXLg19VzGQVviwSgAQBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=")
            ->setIsInternal(false));

        $this->assertEquals(MessageBodyType::Input, $result->getBodyType());
        $this->assertEquals("returnValue", $result->getName());
        $this->assertEquals(["id" => "0x0000000000000000000000000000000000000000000000000000000000000000"], $result->getValue());

        $header = $result->getHeader();
        $this->assertNotNull($header);
        $this->assertEquals(1599458404, $header->getExpire());
        $this->assertEquals(1599458364291, $header->getTime());
        $this->assertEquals("4c7c408ff1ddebb8d6405ee979c716a14fdd6cc08124107a61d3c25597099499", $header->getPubkey());
    }

    public function testDecodeMessage_returnValue_output()
    {
        $result = $this->_module->decodeMessage((new ParamsOfDecodeMessage())
            ->setAbi((new Abi_Contract())->setValue($this->_abi))
            ->setMessage("te6ccgEBAQEAVQAApeACvg5/pmQpY4m61HmJ0ne+zjHJu3MNG8rJxUDLbHKBu/AAAAAAAAAMKr6z6rxK3xYJAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABA"));

        $this->assertEquals(MessageBodyType::Output, $result->getBodyType());
        $this->assertEquals("returnValue", $result->getName());
        $this->assertEquals(["value0" => "0x0000000000000000000000000000000000000000000000000000000000000000"], $result->getValue());
        $this->assertNull($result->getHeader());
    }

    /**
     * @dataProvider encodeMessageInternal_deployDataProvider
     * @param CallSet|null $callSet
     * @param string $expectedBoc
     */
    public function testEncodeMessageInternal_deploy(?CallSet $callSet, string $expectedBoc)
    {
        [$abi, $tvc] = TestClient::package('Hello');

        $result = $this->_module->encodeInternalMessage((new ParamsOfEncodeInternalMessage())
            ->setAbi((new Abi_Contract())->setValue($abi))
            ->setDeploySet((new DeploySet())
                ->setTvc($tvc))
            ->setCallSet($callSet)
            ->setValue('0'));

        $this->assertEquals($expectedBoc, $result->getMessage());

        $bocModule = new BocModule($this->_context);
        $parsed = $bocModule->parseMessage((new ParamsOfParse())
            ->setBoc($result->getMessage()));

        $this->assertNotNull($parsed);

        $codeFromTvc = $bocModule->getCodeFromTvc((new ParamsOfGetCodeFromTvc())
            ->setTvc($tvc));

        $this->assertEquals($codeFromTvc->getCode(), $parsed->getParsed()['code']);
    }

    /**
     * @dataProvider encodeMessageInternal_runDataProvider
     * @param AbiContract|null $abi
     * @param CallSet|null $callSet
     * @param string|null $src
     * @param string|null $dst
     * @param string $expectedBoc
     */
    public function testEncodeMessageInternal_run(?AbiContract $abi, ?CallSet $callSet, ?string $src, ?string $dst, string $expectedBoc)
    {
        $result = $this->_module->encodeInternalMessage((new ParamsOfEncodeInternalMessage())
            ->setAbi($abi ? (new Abi_Contract())->setValue($abi) : null)
            ->setSrcAddress($src)
            ->setAddress($dst)
            ->setCallSet($callSet)
            ->setValue('1000000000')
            ->setBounce(true));

        $this->assertEquals($expectedBoc, $result->getMessage());

        $bocModule = new BocModule($this->_context);
        $parsed = $bocModule->parseMessage((new ParamsOfParse())
            ->setBoc($result->getMessage()));

        $this->assertNotNull($parsed);
        $this->assertEquals('internal', $parsed->getParsed()['msg_type_name']);
        $this->assertEquals($src ? $src : '', $parsed->getParsed()['src']);
        $this->assertEquals($dst ? $dst : $result->getAddress(), $parsed->getParsed()['dst']);
        $this->assertEquals('0x3b9aca00', $parsed->getParsed()['value']);
        $this->assertTrue($parsed->getParsed()['bounce']);
        $this->assertTrue($parsed->getParsed()['ihr_disabled']);
    }

    public function encodeMessageInternal_deployDataProvider(): array
    {
        return [
            [
                null,
                "te6ccgECHAEABGkAAmFiADYO5IoxskLmUfURre2fOB04OmP32VjPwA/lDM/Cpvh8AAAAAAAAAAAAAAAAAAIyBg" .
                "EBAcACAgPPIAUDAQHeBAAD0CAAQdgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAIm/wD0pCAiwAGS9" .
                "KDhiu1TWDD0oQkHAQr0pCD0oQgAAAIBIAwKAej/fyHTAAGOJoECANcYIPkBAXDtRND0BYBA9A7yitcL/wHtRyJv" .
                "de1XAwH5EPKo3u1E0CDXScIBjhb0BNM/0wDtRwFvcQFvdgFvcwFvcu1Xjhj0Be1HAW9ycG9zcG92yIAgz0DJ0G9" .
                "x7Vfi0z8B7UdvEyG5IAsAYJ8wIPgjgQPoqIIIG3dAoLneme1HIW9TIO1XMJSANPLw4jDTHwH4I7zyudMfAfFAAQ" .
                "IBIBgNAgEgEQ4BCbqLVfP4DwH67UdvYW6OO+1E0CDXScIBjhb0BNM/0wDtRwFvcQFvdgFvcwFvcu1Xjhj0Be1HA" .
                "W9ycG9zcG92yIAgz0DJ0G9x7Vfi3u1HbxaS8jOX7Udxb1btV+IA+ADR+CO1H+1HIG8RMAHIyx/J0G9R7VftR28S" .
                "yPQA7UdvE88LP+1HbxYQABzPCwDtR28RzxbJ7VRwagIBahUSAQm0ABrWwBMB/O1Hb2FujjvtRNAg10nCAY4W9AT" .
                "TP9MA7UcBb3EBb3YBb3MBb3LtV44Y9AXtRwFvcnBvc3BvdsiAIM9AydBvce1X4t7tR29lIG6SMHDecO1HbxKAQP" .
                "QO8orXC/+68uBk+AD6QNEgyMn7BIED6HCBAIDIcc8LASLPCgBxz0D4KBQAjs8WJM8WI/oCcc9AcPoCcPoCgEDPQ" .
                "Pgjzwsfcs9AIMki+wBfBTDtR28SyPQA7UdvE88LP+1HbxbPCwDtR28RzxbJ7VRwatswAQm0ZfaLwBYB+O1Hb2Fu" .
                "jjvtRNAg10nCAY4W9ATTP9MA7UcBb3EBb3YBb3MBb3LtV44Y9AXtRwFvcnBvc3BvdsiAIM9AydBvce1X4t7R7Ud" .
                "vEdcLH8iCEFDL7ReCEIAAAACxzwsfIc8LH8hzzwsB+CjPFnLPQPglzws/gCHPQCDPNSLPMbwXAHiWcc9AIc8XlX" .
                "HPQSHN4iDJcfsAWyHA/44e7UdvEsj0AO1HbxPPCz/tR28WzwsA7UdvEc8Wye1U3nFq2zACASAbGQEJu3MS5FgaA" .
                "PjtR29hbo477UTQINdJwgGOFvQE0z/TAO1HAW9xAW92AW9zAW9y7VeOGPQF7UcBb3Jwb3Nwb3bIgCDPQMnQb3Ht" .
                "V+Le+ADR+CO1H+1HIG8RMAHIyx/J0G9R7VftR28SyPQA7UdvE88LP+1HbxbPCwDtR28RzxbJ7VRwatswAMrdcCH" .
                "XSSDBII4rIMAAjhwj0HPXIdcLACDAAZbbMF8H2zCW2zBfB9sw4wTZltswXwbbMOME2eAi0x80IHS7II4VMCCCEP" .
                "////+6IJkwIIIQ/////rrf35bbMF8H2zDgIyHxQAFfBw=="
            ],
            [
                (new CallSet())->setFunctionName('constructor'),
                "te6ccgECHAEABG0AAmliADYO5IoxskLmUfURre2fOB04OmP32VjPwA/lDM/Cpvh8AAAAAAAAAAAAAAAAAAIxot" .
                "V8/gYBAQHAAgIDzyAFAwEB3gQAA9AgAEHYAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQCJv8A9KQgI" .
                "sABkvSg4YrtU1gw9KEJBwEK9KQg9KEIAAACASAMCgHo/38h0wABjiaBAgDXGCD5AQFw7UTQ9AWAQPQO8orXC/8B" .
                "7Ucib3XtVwMB+RDyqN7tRNAg10nCAY4W9ATTP9MA7UcBb3EBb3YBb3MBb3LtV44Y9AXtRwFvcnBvc3BvdsiAIM9" .
                "AydBvce1X4tM/Ae1HbxMhuSALAGCfMCD4I4ED6KiCCBt3QKC53pntRyFvUyDtVzCUgDTy8OIw0x8B+CO88rnTHw" .
                "HxQAECASAYDQIBIBEOAQm6i1Xz+A8B+u1Hb2FujjvtRNAg10nCAY4W9ATTP9MA7UcBb3EBb3YBb3MBb3LtV44Y9" .
                "AXtRwFvcnBvc3BvdsiAIM9AydBvce1X4t7tR28WkvIzl+1HcW9W7VfiAPgA0fgjtR/tRyBvETAByMsfydBvUe1X" .
                "7UdvEsj0AO1HbxPPCz/tR28WEAAczwsA7UdvEc8Wye1UcGoCAWoVEgEJtAAa1sATAfztR29hbo477UTQINdJwgG" .
                "OFvQE0z/TAO1HAW9xAW92AW9zAW9y7VeOGPQF7UcBb3Jwb3Nwb3bIgCDPQMnQb3HtV+Le7UdvZSBukjBw3nDtR2" .
                "8SgED0DvKK1wv/uvLgZPgA+kDRIMjJ+wSBA+hwgQCAyHHPCwEizwoAcc9A+CgUAI7PFiTPFiP6AnHPQHD6AnD6A" .
                "oBAz0D4I88LH3LPQCDJIvsAXwUw7UdvEsj0AO1HbxPPCz/tR28WzwsA7UdvEc8Wye1UcGrbMAEJtGX2i8AWAfjt" .
                "R29hbo477UTQINdJwgGOFvQE0z/TAO1HAW9xAW92AW9zAW9y7VeOGPQF7UcBb3Jwb3Nwb3bIgCDPQMnQb3HtV+L" .
                "e0e1HbxHXCx/IghBQy+0XghCAAAAAsc8LHyHPCx/Ic88LAfgozxZyz0D4Jc8LP4Ahz0AgzzUizzG8FwB4lnHPQC" .
                "HPF5Vxz0EhzeIgyXH7AFshwP+OHu1HbxLI9ADtR28Tzws/7UdvFs8LAO1HbxHPFsntVN5xatswAgEgGxkBCbtzE" .
                "uRYGgD47UdvYW6OO+1E0CDXScIBjhb0BNM/0wDtRwFvcQFvdgFvcwFvcu1Xjhj0Be1HAW9ycG9zcG92yIAgz0DJ" .
                "0G9x7Vfi3vgA0fgjtR/tRyBvETAByMsfydBvUe1X7UdvEsj0AO1HbxPPCz/tR28WzwsA7UdvEc8Wye1UcGrbMAD" .
                "K3XAh10kgwSCOKyDAAI4cI9Bz1yHXCwAgwAGW2zBfB9swltswXwfbMOME2ZbbMF8G2zDjBNngItMfNCB0uyCOFT" .
                "AgghD/////uiCZMCCCEP////6639+W2zBfB9sw4CMh8UABXwc="
            ]
        ];
    }

    public function encodeMessageInternal_runDataProvider(): array
    {
        $abi = TestClient::load_abi('Hello');
        return [
            [
                $abi,
                (new CallSet())->setFunctionName('sayHello'),
                null,
                '0:1234567890abcdef1234567890abcdef1234567890abcdef1234567890abcdef',
                "te6ccgEBAQEAOgAAcGIACRorPEhV5veJGis8SFXm94kaKzxIVeb3iRorPEhV5veh3NZQAAAAAAAAAAAAAAAAAABQy+0X"
            ],
            [
                $abi,
                (new CallSet())->setFunctionName('0x50cbed17'), // sayHello func hex id
                null,
                '0:1234567890abcdef1234567890abcdef1234567890abcdef1234567890abcdef',
                "te6ccgEBAQEAOgAAcGIACRorPEhV5veJGis8SFXm94kaKzxIVeb3iRorPEhV5veh3NZQAAAAAAAAAAAAAAAAAABQy+0X"
            ],
            [
                $abi,
                (new CallSet())->setFunctionName('1355541783'), // sayHello func id
                null,
                '0:1234567890abcdef1234567890abcdef1234567890abcdef1234567890abcdef',
                "te6ccgEBAQEAOgAAcGIACRorPEhV5veJGis8SFXm94kaKzxIVeb3iRorPEhV5veh3NZQAAAAAAAAAAAAAAAAAABQy+0X"
            ],
            // test_encode_internal_message_empty_body
            [
                null,
                null,
                null,
                '0:1234567890abcdef1234567890abcdef1234567890abcdef1234567890abcdef',
                'te6ccgEBAQEANgAAaGIACRorPEhV5veJGis8SFXm94kaKzxIVeb3iRorPEhV5veh3NZQAAAAAAAAAAAAAAAAAAA='
            ],
            [
                null,
                null,
                '0:841288ed3b55d9cdafa806807f02a0ae0c169aa5edfe88a789a6482429756a94',
                '0:1234567890abcdef1234567890abcdef1234567890abcdef1234567890abcdef',
                'te6ccgEBAQEAWAAAq2gBCCUR2nars5tfUA0A/gVBXBgtNUvb/RFPE0yQSFLq1SkABI0VniQq83vEjRWeJCrze8SNFZ4kKvN7xI0VniQq83vQ7msoAAAAAAAAAAAAAAAAAABA'
            ]
        ];
    }

    private function getDeployParams(Signer $signer, ?string $public_key): ParamsOfEncodeMessage
    {
        return (new ParamsOfEncodeMessage())
            ->setAbi((new Abi_Contract())
                ->setValue($this->_abi))
            ->setDeploySet((new DeploySet())
                ->setTvc($this->_tvc))
            ->setCallSet((new CallSet())
                ->setFunctionName("constructor")
                ->setHeader((new FunctionHeader())->
                setPubkey($public_key)
                    ->setTime(1599458364291)
                    ->setExpire(1599458404)))
            ->setSigner($signer);
    }

    private function getRunParams(Signer $signer): ParamsOfEncodeMessage
    {
        return (new ParamsOfEncodeMessage())
            ->setAddress("0:05beb555e942fa744fd96f45a9ea9d0a8248208ca12421947c06e59bc997d309")
            ->setAbi((new Abi_Contract())
                ->setValue($this->_abi))
            ->setCallSet((new CallSet())
                ->setFunctionName("returnValue")
                ->setHeader((new FunctionHeader())
                    ->setTime(1599458364291)
                    ->setExpire(1599458404))
                ->setInput(['id' => '0']))
            ->setSigner($signer);
    }

    private function signDetached(string $data): string
    {
        $signKeys = $this->_crypto
            ->naclSignKeypairFromSecretKey((new ParamsOfNaclSignKeyPairFromSecret())
                ->setSecret($this->_keys->getSecret()));

        $signature = $this->_crypto
            ->naclSignDetached((new ParamsOfNaclSign())
                ->setUnsigned($data)
                ->setSecret($signKeys->getSecret()));

        return $signature->getSignature();
    }
}
