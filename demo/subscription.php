<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\Abi\CallSet;
use TON\Abi\Contract;
use TON\Abi\DeploySet;
use TON\Abi\Keys;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;
use TON\Net\ParamsOfSubscribeCollection;
use TON\TestClient;
use TON\TonClientBuilder;

// This demo shows how to subscribe to various evens in network.
// First it creates a subscription for all transactions matching the
// specified filter, like, having the given address and status=3 (Finished).
// Then it waits for at least 2 new events to fire and ends subscription.
//
// Note: this demo requires local NodeSE running on localhost:8888

$client = TonClientBuilder::create()
    ->withConfig((new ClientConfig())
        ->setNetwork((new NetworkConfig())
            ->setServerAddress("http://localhost:8888")))
    ->withLogger((new Logger(__FILE__))
        ->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG)))
    ->build();

$keys = $client->crypto()->generateRandomSignKeys();

$deployParams = (new ParamsOfEncodeMessage())
    ->setAbi((new Contract())
        ->setValue(TestClient::load_abi('Hello')))
    ->setDeploySet((new DeploySet())
        ->setTvc(TestClient::load_tvc('Hello')))
    ->setSigner((new Keys())->setKeys($keys))
    ->setCallSet((new CallSet())
        ->setFunctionName("constructor"));

$msg = $client->abi()->encodeMessage($deployParams);

$subscribePromise = $client->net()->async()
    ->subscribeCollectionAsync((new ParamsOfSubscribeCollection())
        ->setCollection("transactions")
        ->setFilter([
            "account_addr" => ["eq" => $msg->getAddress()],
            "status" => ["eq" => 3] // Finalized
        ])
        ->setResult("id account_addr"));

$handle = $subscribePromise->await();
foreach ($subscribePromise->getEvents() as $event) {
    var_dump($event);
    $client->net()->async()
        ->unsubscribeAsync($handle)
        ->await();
}