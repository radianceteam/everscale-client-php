# TON Client Wrapper for PHP

**Community links:**

[![Chat on Telegram](https://img.shields.io/badge/chat-on%20telegram-9cf.svg)](https://t.me/RADIANCE_TON_SDK)

True async wrapper using [ton_client](https://github.com/radianceteam/ton-client-php-ext/) 
extension with multi-threading and blocking queues under the hood.

## Requirements

 - PHP version 7.4 or higher.
 - Composer (https://getcomposer.org/)

## Installation

1. Install [TON Client PHP extension](https://github.com/radianceteam/ton-client-php-ext) as described 
   in [readme](https://github.com/radianceteam/ton-client-php-ext/blob/master/install.md).
2. Run `composer`: 

```shell
composer require radianceteam/ton-client-php
```

## Usage examples

### Basic example

```php
use TON\TonClient;

$client = new TonClient();
$result = $client->client()->version();
echo "TON SDK Version: {$result->getVersion()}";
```

### Configuration & Logging

```php
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;
use TON\TonClientBuilder;

$client = TonClientBuilder::create()
    ->withConfig((new ClientConfig())
        ->setNetwork((new NetworkConfig())
            ->setServerAddress("http://localhost:8888")))
    ->withLogger((new Logger("demo"))
        ->pushHandler(new StreamHandler('demo.log', Logger::DEBUG)))
    ->build();
```

### Handling async events

Each module interface has `async()` function which returns asynchronous
interface version. Note that some functions, like in processing module,
have async versions only. 

```php
use TON\TonClient;
use TON\Net\ParamsOfWaitForCollection;

$client = new TonClient();

$promise = $client->net()->async()->waitForCollectionAsync(
    (new ParamsOfWaitForCollection())
        ->setCollection("transactions")
        ->setFilter(["now" => ["gt" => time()]])
        ->setResult("id now"));

echo "Awaiting for new transactions...";
$result = $promise->await();
```

### Subscribing to events

Async interface also allows processing events occurred between function start and finish.
This can be achieved via calling `getEvents()` function of the returned promise.
Note this blocks the current program flow until the new event fired,
or the unsubscribe function called.

```php
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

$client = TonClientBuilder::create()
    ->withConfig((new ClientConfig())
        ->setNetwork((new NetworkConfig())
            ->setServerAddress("http://localhost:8888")))
    ->build();

$keys = $client->crypto()->generateRandomSignKeys();

$msg = $client->abi()->encodeMessage((new ParamsOfEncodeMessage())
    ->setAbi((new Contract())
        ->setValue(TestClient::load_abi('Hello')))
    ->setDeploySet((new DeploySet())
        ->setTvc(TestClient::load_tvc('Hello')))
    ->setSigner((new Keys())->setKeys($keys))
    ->setCallSet((new CallSet())
        ->setFunctionName("constructor")));

$subscribePromise = $client->net()->async()
    ->subscribeCollectionAsync((new ParamsOfSubscribeCollection())
        ->setCollection("transactions")
        ->setFilter([
            "account_addr" => ["eq" => $msg->getAddress()],
            "status" => ["eq" => 3] // Finalized
        ])
        ->setResult("id account_addr"));

// Wait for the very first event, then unsubscribe
$handle = $subscribePromise->await();
foreach ($subscribePromise->getEvents() as $event) {
    var_dump($event);
    $client->net()->async()
        ->unsubscribeAsync($handle)
        ->await();
}
```
 
## Development

See [Development notes](development.md).

## License

Apache License, Version 2.0.

## Troubleshooting

Fire any question to our [Telegram channel](https://t.me/RADIANCE_TON_SDK).