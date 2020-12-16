<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;
use TON\Net\ParamsOfWaitForCollection;
use TON\TonClientBuilder;

$client = TonClientBuilder::create()
    ->withConfig((new ClientConfig())
        ->setNetwork((new NetworkConfig())
            ->setServerAddress(getenv('TON_NETWORK_ADDRESS'))))
    ->withLogger((new Logger(__FILE__))
        ->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG)))
    ->build();

$promise = $client->net()->async()->waitForCollectionAsync(
    (new ParamsOfWaitForCollection())
        ->setCollection("transactions")
        ->setFilter(["now" => ["gt" => time()]])
        ->setResult("id now"));

echo "Awaiting for new transactions...\n";
$result = $promise->await(10000);

if (!$result->getResult()) {
    echo "Await timeout out";
} else {
    $transactionId = $result->getResult()["id"];
    echo "Got new transaction ID ${transactionId}";
}
