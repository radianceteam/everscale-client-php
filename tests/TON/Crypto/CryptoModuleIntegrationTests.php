<?php declare(strict_types=1);

namespace TON\Crypto;

use RuntimeException;
use TON\AbstractIntegrationTest;

class CryptoModuleIntegrationTests extends AbstractIntegrationTest
{
    public function testSigningBox()
    {
        $keys = self::$client->crypto()->generateRandomSignKeys();
        $keysBox = self::$client->crypto()->getSigningBox($keys);

        $externalBox = self::$client->crypto()->async()->registerSigningBoxAsync(function ($request) use ($keysBox) {
            $params = ParamsOfAppSigningBox::create($request);
            switch (get_class($params)) {
                case ParamsOfAppSigningBox_GetPublicKey::class:
                    $result = self::$client->crypto()->signingBoxGetPublicKey($keysBox);
                    return (new ResultOfAppSigningBox_GetPublicKey())
                        ->setPublicKey($result->getPubkey());
                case ParamsOfAppSigningBox_Sign::class:
                    $result = self::$client->crypto()->signingBoxSign((new ParamsOfSigningBoxSign())
                        ->setUnsigned($params->getUnsigned())
                        ->setSigningBox($keysBox->getHandle()));
                    return (new ResultOfAppSigningBox_Sign())
                        ->setSignature($result->getSignature());
                default:
                    throw new RuntimeException("Unsupported app signing box parameter type: " . get_class($params));
            }
        })->await();

        $boxPubKey = self::$client->crypto()->async()
            ->signingBoxGetPublicKeyAsync($externalBox)
            ->await();

        $this->assertEquals($keys->getPublic(), $boxPubKey->getPubkey());

        $unsigned = base64_encode("Test Message");
        $boxSign = self::$client->crypto()->async()->signingBoxSignAsync((new ParamsOfSigningBoxSign())
            ->setUnsigned($unsigned)
            ->setSigningBox($externalBox->getHandle()))
            ->await();

        $keysSign = self::$client->crypto()->sign((new ParamsOfSign())
            ->setUnsigned($unsigned)
            ->setKeys($keys));

        $this->assertEquals(
            $boxSign->getSignature(),
            $keysSign->getSignature());

        self::$client->crypto()->removeSigningBox($externalBox);
        self::$client->crypto()->removeSigningBox($keysBox);
    }
}