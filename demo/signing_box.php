<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\Crypto\ParamsOfAppSigningBox;
use TON\Crypto\ParamsOfAppSigningBox_GetPublicKey;
use TON\Crypto\ParamsOfAppSigningBox_Sign;
use TON\Crypto\ParamsOfSigningBoxSign;
use TON\Crypto\ResultOfAppSigningBox_GetPublicKey;
use TON\Crypto\ResultOfAppSigningBox_Sign;
use TON\TonClientBuilder;

$client = TonClientBuilder::create()
    ->withLogger((new Logger(__FILE__))
        ->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG)))
    ->build();

$keys = $client->crypto()->generateRandomSignKeys();
$keysBox = $client->crypto()->getSigningBox($keys);

// Register custom external signing box which uses $keysBox for demonstration purposes
$externalBox = $client->crypto()->async()->registerSigningBoxAsync(function ($request) use ($client, $keysBox) {
    $params = ParamsOfAppSigningBox::create($request);
    switch (get_class($params)) {
        case ParamsOfAppSigningBox_GetPublicKey::class:
            $result = $client->crypto()->signingBoxGetPublicKey($keysBox);
            return (new ResultOfAppSigningBox_GetPublicKey())
                ->setPublicKey($result->getPubkey());
        case ParamsOfAppSigningBox_Sign::class:
            $result = $client->crypto()->signingBoxSign((new ParamsOfSigningBoxSign())
                ->setUnsigned($params->getUnsigned())
                ->setSigningBox($keysBox->getHandle()));
            return (new ResultOfAppSigningBox_Sign())
                ->setSignature($result->getSignature());
        default:
            throw new RuntimeException("Unsupported app signing box parameter type: " . get_class($params));
    }
})->await();

// Obtain public key for the custom external signing box
$boxPubKey = $client->crypto()->async()
    ->signingBoxGetPublicKeyAsync($externalBox)
    ->await();

var_dump($boxPubKey);

// Signing demo
$unsigned = base64_encode("Test Message");
$boxSign = $client->crypto()->async()->signingBoxSignAsync((new ParamsOfSigningBoxSign())
    ->setUnsigned($unsigned)
    ->setSigningBox($externalBox->getHandle()))
    ->await();

var_dump($boxSign);
