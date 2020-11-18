<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\Net\ParamsOfWaitForCollection;
use TON\TonClientBuilder;

$client = TonClientBuilder::create()
    ->withLogger((new Logger(__FILE__))
        ->pushHandler(new StreamHandler(__FILE__ . '.log', Logger::DEBUG)))
    ->build();

$promise = $client->net()->async()->waitForCollectionAsync(
    (new ParamsOfWaitForCollection())
        ->setCollection("transactions")
        ->setFilter(["now" => ["gt" => time()]])
        ->setResult("id now"));

echo "Awaiting for new transactions...";
$result = $promise->await();

if (!$result->getResult()) {
    echo "Await timeout out";
} else {
    $transactionId = $result->getResult()["id"];
    echo "Got new transaction ID ${transactionId}";
}
