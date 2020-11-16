<?php declare(strict_types=1);

namespace TON;

use TON\Crypto\CryptoModule;
use TON\Crypto\KeyPair;
use TON\Crypto\ParamsOfChaCha20;
use TON\Crypto\ParamsOfConvertPublicKeyToTonSafeFormat;
use TON\Crypto\ParamsOfFactorize;
use TON\Crypto\ParamsOfGenerateRandomBytes;
use TON\Crypto\ParamsOfHash;
use TON\Crypto\ParamsOfHDKeyDeriveFromXPrv;
use TON\Crypto\ParamsOfHDKeyDeriveFromXPrvPath;
use TON\Crypto\ParamsOfHDKeyPublicFromXPrv;
use TON\Crypto\ParamsOfHDKeySecretFromXPrv;
use TON\Crypto\ParamsOfHDKeyXPrvFromMnemonic;
use TON\Crypto\ParamsOfMnemonicDeriveSignKeys;
use TON\Crypto\ParamsOfMnemonicFromEntropy;
use TON\Crypto\ParamsOfMnemonicFromRandom;
use TON\Crypto\ParamsOfMnemonicVerify;
use TON\Crypto\ParamsOfMnemonicWords;
use TON\Crypto\ParamsOfModularPower;
use TON\Crypto\ParamsOfNaclBox;
use TON\Crypto\ParamsOfNaclBoxKeyPairFromSecret;
use TON\Crypto\ParamsOfNaclBoxOpen;
use TON\Crypto\ParamsOfNaclSecretBox;
use TON\Crypto\ParamsOfNaclSecretBoxOpen;
use TON\Crypto\ParamsOfNaclSign;
use TON\Crypto\ParamsOfNaclSignKeyPairFromSecret;
use TON\Crypto\ParamsOfNaclSignOpen;
use TON\Crypto\ParamsOfScrypt;
use TON\Crypto\ParamsOfSign;
use TON\Crypto\ParamsOfTonCrc16;
use TON\Crypto\ParamsOfVerifySignature;

function hex_to_base64(string $hex): string
{
    $return = '';
    foreach (str_split($hex, 2) as $pair) {
        $return .= chr(hexdec($pair));
    }
    return base64_encode($return);
}

class CryptoModuleTests extends AbstractModuleTestCase
{
    private CryptoModule $_crypto;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_crypto = new CryptoModule($this->_context);
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

    /**
     * @dataProvider sha255Provider
     * @param string $input Hashing input.
     * @param string $expected Expected hashing result.
     */
    public function testSha256(string $input, string $expected)
    {
        $result = $this->_crypto->sha256((new ParamsOfHash())
            ->setData($input));
        $this->assertNotNull($result);
        $this->assertEquals($expected, $result->getHash());
    }

    public function sha255Provider(): array
    {
        return [
            [
                base64_encode("Message to hash with sha 256"),
                "16fd057308dd358d5a9b3ba2de766b2dfd5e308478fc1f7ba5988db2493852f5"
            ],
            [
                hex_to_base64("4d65737361676520746f206861736820776974682073686120323536"),
                "16fd057308dd358d5a9b3ba2de766b2dfd5e308478fc1f7ba5988db2493852f5"
            ],
            [
                "TWVzc2FnZSB0byBoYXNoIHdpdGggc2hhIDI1Ng==",
                "16fd057308dd358d5a9b3ba2de766b2dfd5e308478fc1f7ba5988db2493852f5"
            ]
        ];
    }

    public function testSha512()
    {
        $result = $this->_crypto->sha512((new ParamsOfHash())
            ->setData(base64_encode("Message to hash with sha 512")));
        $this->assertNotNull($result);
        $this->assertEquals("2616a44e0da827f0244e93c2b0b914223737a6129bc938b8edf2780ac9482960baa9b7c7cdb11457c1cebd5ae77e295ed94577f32d4c963dc35482991442daa5", $result->getHash());
    }

    public function testScrypt()
    {
        $result = $this->_crypto->scrypt((new ParamsOfScrypt())
            ->setPassword(base64_encode("Test Password"))
            ->setSalt(base64_encode("Test Salt"))
            ->setLogN(10)
            ->setR(8)
            ->setP(16)
            ->setDkLen(64));

        $this->assertEquals(
            "52e7fcf91356eca55fc5d52f16f5d777e3521f54e3c570c9bbb7df58fc15add73994e5db42be368de7ebed93c9d4f21f9be7cc453358d734b04a057d0ed3626d",
            $result->getKey());
    }

    public function testNaclSignKeypairFromSecretKey()
    {
        $result = $this->_crypto->naclSignKeypairFromSecretKey(
            (new ParamsOfNaclSignKeyPairFromSecret())
                ->setSecret("8fb4f2d256e57138fb310b0a6dac5bbc4bee09eb4821223a720e5b8e1f3dd674"));

        $this->assertEquals(
            "aa5533618573860a7e1bf19f34bd292871710ed5b2eafa0dcdbb33405f2231c6",
            $result->getPublic());
    }

    public function testNaclSign()
    {
        $result = $this->_crypto->naclSign((new ParamsOfNaclSign())
            ->setUnsigned(base64_encode("Test Message"))
            ->setSecret("56b6a77093d6fdf14e593f36275d872d75de5b341942376b2a08759f3cbae78f1869b7ef29d58026217e9cf163cbfbd0de889bdf1bf4daebf5433a312f5b8d6e"));

        $this->assertEquals(
            "+wz+QO6l1slgZS5s65BNqKcu4vz24FCJz4NSAxef9lu0jFfs8x3PzSZRC+pn5k8+aJi3xYMA3BQzglQmjK3hA1Rlc3QgTWVzc2FnZQ==",
            $result->getSigned());
    }

    public function testNaclSignOpen()
    {
        $result = $this->_crypto->naclSignOpen((new ParamsOfNaclSignOpen())
            ->setPublic("1869b7ef29d58026217e9cf163cbfbd0de889bdf1bf4daebf5433a312f5b8d6e")
            ->setSigned(hex_to_base64("fb0cfe40eea5d6c960652e6ceb904da8a72ee2fcf6e05089cf835203179ff65bb48c57ecf31dcfcd26510bea67e64f3e6898b7c58300dc14338254268cade10354657374204d657373616765")));

        $this->assertEquals(
            "Test Message",
            base64_decode($result->getUnsigned()));
    }

    public function testNaclSignDetached()
    {
        $result = $this->_crypto->naclSignDetached((new ParamsOfNaclSign())
            ->setUnsigned(base64_encode("Test Message"))
            ->setSecret("56b6a77093d6fdf14e593f36275d872d75de5b341942376b2a08759f3cbae78f1869b7ef29d58026217e9cf163cbfbd0de889bdf1bf4daebf5433a312f5b8d6e"));

        $this->assertEquals(
            "fb0cfe40eea5d6c960652e6ceb904da8a72ee2fcf6e05089cf835203179ff65bb48c57ecf31dcfcd26510bea67e64f3e6898b7c58300dc14338254268cade103",
            $result->getSignature());
    }

    public function testNaclBoxKeypair()
    {
        $result = $this->_crypto->naclBoxKeypair();
        $this->assertNotEmpty($result->getPublic());
        $this->assertNotEmpty($result->getSecret());
        $this->assertEquals(64, strlen($result->getPublic()));
        $this->assertEquals(64, strlen($result->getSecret()));
        $this->assertNotEquals($result->getPublic(), $result->getSecret());
    }

    public function testNaclBoxKeypairFormSecretKey()
    {
        $result = $this->_crypto->naclBoxKeypairFromSecretKey(
            (new ParamsOfNaclBoxKeyPairFromSecret())
                ->setSecret("e207b5966fb2c5be1b71ed94ea813202706ab84253bdf4dc55232f82a1caf0d4"));

        $this->assertEquals("a53b003d3ffc1e159355cb37332d67fc235a7feb6381e36c803274074dc3933a",
            $result->getPublic());
    }

    public function testNaclBox()
    {
        $result = $this->_crypto->naclBox(
            (new ParamsOfNaclBox())
                ->setDecrypted(base64_encode("Test Message"))
                ->setNonce("cd7f99924bf422544046e83595dd5803f17536f5c9a11746")
                ->setTheirPublic("c4e2d9fe6a6baf8d1812b799856ef2a306291be7a7024837ad33a8530db79c6b")
                ->setSecret("d9b9dc5033fb416134e5d2107fdbacab5aadb297cb82dbdcd137d663bac59f7f"));

        $this->assertEquals(
            "li4XED4kx/pjQ2qdP0eR2d/K30uN94voNADxwA==",
            $result->getEncrypted());
    }

    public function testNaclBoxOpen()
    {
        $result = $this->_crypto->naclBoxOpen(
            (new ParamsOfNaclBoxOpen())
                ->setEncrypted(hex_to_base64("962e17103e24c7fa63436a9d3f4791d9dfcadf4b8df78be83400f1c0"))
                ->setNonce("cd7f99924bf422544046e83595dd5803f17536f5c9a11746")
                ->setTheirPublic("c4e2d9fe6a6baf8d1812b799856ef2a306291be7a7024837ad33a8530db79c6b")
                ->setSecret("d9b9dc5033fb416134e5d2107fdbacab5aadb297cb82dbdcd137d663bac59f7f"));

        $this->assertEquals(
            "Test Message",
            base64_decode($result->getDecrypted()));
    }

    public function testNaclSecretBox()
    {
        $result = $this->_crypto->naclSecretBox(
            (new ParamsOfNaclSecretBox())
                ->setDecrypted(base64_encode("Test Message"))
                ->setNonce("2a33564717595ebe53d91a785b9e068aba625c8453a76e45")
                ->setKey("8f68445b4e78c000fe4d6b7fc826879c1e63e3118379219a754ae66327764bd8"));

        $this->assertEquals(
            "JL7ejKWe2KXmrsns41yfXoQF0t/C1Q8RGyzQ2A==",
            $result->getEncrypted());
    }

    public function testNaclSecretBoxOpen()
    {
        $box = $this->_crypto->naclSecretBox(
            (new ParamsOfNaclSecretBox())
                ->setDecrypted(base64_encode("Text with \' and \" and : {}"))
                ->setNonce("2a33564717595ebe53d91a785b9e068aba625c8453a76e45")
                ->setKey("8f68445b4e78c000fe4d6b7fc826879c1e63e3118379219a754ae66327764bd8"));

        $result = $this->_crypto->naclSecretBoxOpen(
            (new ParamsOfNaclSecretBoxOpen())
                ->setEncrypted($box->getEncrypted())
                ->setNonce("2a33564717595ebe53d91a785b9e068aba625c8453a76e45")
                ->setKey("8f68445b4e78c000fe4d6b7fc826879c1e63e3118379219a754ae66327764bd8"));

        $this->assertEquals(
            "Text with \' and \" and : {}",
            base64_decode($result->getDecrypted())
        );
    }

    public function testMnemonicWords()
    {
        $result = $this->_crypto->mnemonicWords(new ParamsOfMnemonicWords());
        $this->assertCount(2048, explode(" ", $result->getWords()));
    }

    public function mnemonicFromRandomProvider(): array
    {
        $result = [];
        foreach (range(1, 8) as $dictionary) {
            foreach (range(12, 24, 3) as $word_count) {
                $result[] = [$dictionary, $word_count];
            }
        }
        return $result;
    }

    /**
     * @dataProvider mnemonicFromRandomProvider
     * @param int $dictionary
     * @param int $word_count
     */
    public function testMnemonicFromRandom(int $dictionary, int $word_count)
    {
        $result = $this->_crypto->mnemonicFromRandom(
            (new ParamsOfMnemonicFromRandom())
                ->setDictionary($dictionary)
                ->setWordCount($word_count));

        $this->assertCount($word_count, explode(' ', $result->getPhrase()));
    }

    public function testMnemonicFromRandom_defaultParams()
    {
        $result = $this->_crypto->mnemonicFromRandom(new ParamsOfMnemonicFromRandom());
        $this->assertCount(12, explode(' ', $result->getPhrase()));
    }

    public function testMnemonicFromEntropy()
    {
        $result = $this->_crypto->mnemonicFromEntropy(
            (new ParamsOfMnemonicFromEntropy())
                ->setEntropy("00112233445566778899AABBCCDDEEFF")
                ->setDictionary(1)
                ->setWordCount(12));

        $this->assertEquals(
            "abandon math mimic master filter design carbon crystal rookie group knife young",
            $result->getPhrase());
    }

    public function testMnemonicFromEntropy_defaultParams()
    {
        $result = $this->_crypto->mnemonicFromEntropy(
            (new ParamsOfMnemonicFromEntropy())
                ->setEntropy("2199ebe996f14d9e4e2595113ad1e627"));

        $result = $this->_crypto->mnemonicDeriveSignKeys(
            (new ParamsOfMnemonicDeriveSignKeys())
                ->setPhrase($result->getPhrase()));

        $result = $this->_crypto->convertPublicKeyToTonSafeFormat(
            (new ParamsOfConvertPublicKeyToTonSafeFormat())
                ->setPublicKey($result->getPublic()));

        $this->assertEquals(
            "PuZdw_KyXIzo8IksTrERN3_WoAoYTyK7OvM-yaLk711sUIB3",
            $result->getTonPublicKey());
    }

    /**
     * @dataProvider mnemonicFromRandomProvider
     * @param int $dictionary
     * @param int $word_count
     */
    public function testMnemonicVerify(int $dictionary, int $word_count)
    {
        $result = $this->_crypto->mnemonicFromRandom(
            (new ParamsOfMnemonicFromRandom())
                ->setDictionary($dictionary)
                ->setWordCount($word_count));

        $verify_result = $this->_crypto->mnemonicVerify(
            (new ParamsOfMnemonicVerify())
                ->setDictionary($dictionary)
                ->setWordCount($word_count)
                ->setPhrase($result->getPhrase()));

        $this->assertTrue($verify_result->isValid());
    }

    public function testMnemonicVerify_notValid()
    {
        $result = $this->_crypto->mnemonicVerify(
            (new ParamsOfMnemonicVerify())
                ->setPhrase("one two"));

        $this->assertFalse($result->isValid());
    }

    public function testMnemonicDeriveSignKeys()
    {
        $result = $this->_crypto->mnemonicDeriveSignKeys(
            (new ParamsOfMnemonicDeriveSignKeys())
                ->setPhrase("unit follow zone decline glare flower crisp vocal adapt magic much mesh cherry teach mechanic rain float vicious solution assume hedgehog rail sort chuckle")
                ->setDictionary(0)
                ->setWordCount(24));

        $result = $this->_crypto->convertPublicKeyToTonSafeFormat(
            (new ParamsOfConvertPublicKeyToTonSafeFormat())
                ->setPublicKey($result->getPublic()));

        $this->assertEquals(
            "PuYTvCuf__YXhp-4jv3TXTHL0iK65ImwxG0RGrYc1sP3H4KS",
            $result->getTonPublicKey());
    }

    public function testMnemonicDeriveSignKeys_defaultParams()
    {
        $result = $this->_crypto->mnemonicDeriveSignKeys(
            (new ParamsOfMnemonicDeriveSignKeys())
                ->setPhrase("abandon math mimic master filter design carbon crystal rookie group knife young"));

        $result = $this->_crypto->convertPublicKeyToTonSafeFormat(
            (new ParamsOfConvertPublicKeyToTonSafeFormat())
                ->setPublicKey($result->getPublic()));

        $this->assertEquals(
            "PuZhw8W5ejPJwKA68RL7sn4_RNmeH4BIU_mEK7em5d4_-cIx",
            $result->getTonPublicKey());
    }

    public function testMnemonicDeriveSignKeys_withPath()
    {
        $result = $this->_crypto->mnemonicDeriveSignKeys(
            (new ParamsOfMnemonicDeriveSignKeys())
                ->setPhrase("unit follow zone decline glare flower crisp vocal adapt magic much mesh cherry teach mechanic rain float vicious solution assume hedgehog rail sort chuckle")
                ->setPath("m")
                ->setDictionary(0)
                ->setWordCount(24));

        $result = $this->_crypto->convertPublicKeyToTonSafeFormat(
            (new ParamsOfConvertPublicKeyToTonSafeFormat())
                ->setPublicKey($result->getPublic()));

        $this->assertEquals(
            "PubDdJkMyss2qHywFuVP1vzww0TpsLxnRNnbifTCcu-XEgW0",
            $result->getTonPublicKey());
    }

    public function testHdkeyXprvFromMnemonic()
    {
        $result = $this->_crypto->hdkeyXprvFromMnemonic(
            (new ParamsOfHDKeyXPrvFromMnemonic())
                ->setPhrase("abuse boss fly battle rubber wasp afraid hamster guide essence vibrant tattoo"));

        $this->assertEquals(
            "xprv9s21ZrQH143K25JhKqEwvJW7QAiVvkmi4WRenBZanA6kxHKtKAQQKwZG65kCyW5jWJ8NY9e3GkRoistUjjcpHNsGBUv94istDPXvqGNuWpC",
            $result->getXprv());
    }

    public function testHdkeySecretFromXprv()
    {
        $result = $this->_crypto->hdkeySecretFromXprv(
            (new ParamsOfHDKeySecretFromXPrv())
                ->setXprv("xprv9s21ZrQH143K25JhKqEwvJW7QAiVvkmi4WRenBZanA6kxHKtKAQQKwZG65kCyW5jWJ8NY9e3GkRoistUjjcpHNsGBUv94istDPXvqGNuWpC"));

        $this->assertEquals(
            "0c91e53128fa4d67589d63a6c44049c1068ec28a63069a55ca3de30c57f8b365",
            $result->getSecret());
    }

    public function testHdkeySecretFromXprv_child()
    {
        $result = $this->_crypto->hdkeySecretFromXprv(
            (new ParamsOfHDKeySecretFromXPrv())
                ->setXprv("xprv9uZwtSeoKf1swgAkVVCEUmC2at6t7MCJoHnBbn1MWJZyxQ4cySkVXPyNh7zjf9VjsP4vEHDDD2a6R35cHubg4WpzXRzniYiy8aJh1gNnBKv"));

        $this->assertEquals(
            "518afc6489b61d4b738ee9ad9092815fa014ffa6e9a280fa17f84d95f31adb91",
            $result->getSecret());
    }

    public function testHdkeySecretFromXprv_path()
    {
        $result = $this->_crypto->hdkeySecretFromXprv(
            (new ParamsOfHDKeySecretFromXPrv())
                ->setXprv("xprvA1KNMo63UcGjmDF1bX39Cw2BXGUwrwMjeD5qvQ3tA3qS3mZQkGtpf4DHq8FDLKAvAjXsYGLHDP2dVzLu9ycta8PXLuSYib2T3vzLf3brVgZ"));

        $this->assertEquals(
            "1c566ade41169763b155761406d3cef08b29b31cf8014f51be08c0cb4e67c5e1",
            $result->getSecret());
    }

    public function testHdkeyPublicFromXprv()
    {
        $result = $this->_crypto->hdkeyPublicFromXprv(
            (new ParamsOfHDKeyPublicFromXPrv())
                ->setXprv("xprv9s21ZrQH143K25JhKqEwvJW7QAiVvkmi4WRenBZanA6kxHKtKAQQKwZG65kCyW5jWJ8NY9e3GkRoistUjjcpHNsGBUv94istDPXvqGNuWpC"));

        $this->assertEquals(
            "02a8eb63085f73c33fa31b4d1134259406347284f8dab6fc68f4bf8c96f6c39b75",
            $result->getPublic());
    }

    public function testHdkeyPublicFromXprv_child()
    {
        $result = $this->_crypto->hdkeyPublicFromXprv(
            (new ParamsOfHDKeyPublicFromXPrv())
                ->setXprv("xprv9uZwtSeoKf1swgAkVVCEUmC2at6t7MCJoHnBbn1MWJZyxQ4cySkVXPyNh7zjf9VjsP4vEHDDD2a6R35cHubg4WpzXRzniYiy8aJh1gNnBKv"));

        $this->assertEquals(
            "027a598c7572dbb4fbb9663a0c805576babf7faa173a4288a48a52f6f427e12be1",
            $result->getPublic());
    }

    public function testHdkeyPublicFromXprv_path()
    {
        $result = $this->_crypto->hdkeyPublicFromXprv(
            (new ParamsOfHDKeyPublicFromXPrv())
                ->setXprv("xprvA1KNMo63UcGjmDF1bX39Cw2BXGUwrwMjeD5qvQ3tA3qS3mZQkGtpf4DHq8FDLKAvAjXsYGLHDP2dVzLu9ycta8PXLuSYib2T3vzLf3brVgZ"));

        $this->assertEquals(
            "02a87d9764eedaacee45b0f777b5a242939b05fa06873bf511ca9a59cb46a5f526",
            $result->getPublic());
    }

    public function testHdkeyDeriveFromXprv()
    {
        $result = $this->_crypto->hdkeyDeriveFromXprv(
            (new ParamsOfHDKeyDeriveFromXPrv())
                ->setXprv("xprv9s21ZrQH143K25JhKqEwvJW7QAiVvkmi4WRenBZanA6kxHKtKAQQKwZG65kCyW5jWJ8NY9e3GkRoistUjjcpHNsGBUv94istDPXvqGNuWpC")
                ->setChildIndex(0)
                ->setHardened(false));

        $this->assertEquals(
            "xprv9uZwtSeoKf1swgAkVVCEUmC2at6t7MCJoHnBbn1MWJZyxQ4cySkVXPyNh7zjf9VjsP4vEHDDD2a6R35cHubg4WpzXRzniYiy8aJh1gNnBKv",
            $result->getXprv());
    }

    public function testHdkeyDeriveFromXprvPath()
    {
        $result = $this->_crypto->hdkeyDeriveFromXprvPath(
            (new ParamsOfHDKeyDeriveFromXPrvPath())
                ->setXprv("xprv9s21ZrQH143K25JhKqEwvJW7QAiVvkmi4WRenBZanA6kxHKtKAQQKwZG65kCyW5jWJ8NY9e3GkRoistUjjcpHNsGBUv94istDPXvqGNuWpC")
                ->setPath("m/44'/60'/0'/0'"));

        $this->assertEquals(
            "xprvA1KNMo63UcGjmDF1bX39Cw2BXGUwrwMjeD5qvQ3tA3qS3mZQkGtpf4DHq8FDLKAvAjXsYGLHDP2dVzLu9ycta8PXLuSYib2T3vzLf3brVgZ",
            $result->getXprv());
    }

    public function testChacha20()
    {
        $key = str_repeat("01", 32);
        $nonce = str_repeat("ff", 12);

        $encrypted = $this->_crypto->chacha20(
            (new ParamsOfChaCha20())
                ->setNonce($nonce)
                ->setKey($key)
                ->setData(base64_encode("Message")));

        $this->assertEquals("w5QOGsJodQ==", $encrypted->getData());
    }

    public function testChacha20_decrypt()
    {
        $key = str_repeat("01", 32);
        $nonce = str_repeat("ff", 12);

        $decrypted = $this->_crypto->chacha20(
            (new ParamsOfChaCha20())
                ->setNonce($nonce)
                ->setKey($key)
                ->setData("w5QOGsJodQ=="));

        $this->assertEquals("Message", base64_decode($decrypted->getData()));
    }
}