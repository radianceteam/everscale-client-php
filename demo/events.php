<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\Abi\Abi_Contract;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\FunctionHeader;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer_Keys;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;
use TON\Processing\ParamsOfSendMessage;
use TON\TestClient;
use TON\TonClientBuilder;

// This demo shows how to subscribe to various evens in network.
// It tries to send message and loops over all events fired
// before the completion of send operation.
//
// Note: this demo requires local NodeSE running on localhost:8888

$client = TonClientBuilder::create()
    ->withConfig((new ClientConfig())
        ->setNetwork((new NetworkConfig())
            ->setServerAddress(getenv('TON_NETWORK_ADDRESS'))))
    ->withLogger((new Logger(__FILE__))
        ->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG)))
    ->build();

[$abi, $tvc] = TestClient::package('Events', 2);
$keys = $client->crypto()->generateRandomSignKeys();
$contract = (new Abi_Contract())->setValue($abi);

$encoded = $client->abi()->encodeMessage((new ParamsOfEncodeMessage())
    ->setAbi($contract)
    ->setDeploySet((new DeploySet())
        ->setTvc($tvc))
    ->setCallSet((new CallSet())
        ->setFunctionName("constructor")
        ->setHeader((new FunctionHeader())
            ->setPubkey($keys->getPublic())))
    ->setSigner((new Signer_Keys())->setKeys($keys)));

$sendPromise = $client->processing()->async()
    ->sendMessageAsync((new ParamsOfSendMessage())
        ->setMessage($encoded->getMessage())
        ->setSendEvents(true)
        ->setAbi($contract));

// Read all events...
foreach ($sendPromise->getEvents() as $event) {
    var_dump($event);
}

// Then get the result
$result = $sendPromise->await();
var_dump($result);