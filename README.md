# TON Client Wrapper for PHP

**Community links:**

[![Chat on Telegram](https://img.shields.io/badge/chat-on%20telegram-9cf.svg)](https://t.me/RADIANCE_TON_SDK)

True async wrapper powered by [ton_client](https://github.com/radianceteam/ton-client-php-ext/)
extension with multi-threading and blocking queues under the hood.

## Requirements

- PHP version 7.4+ or 8.0+.
- Composer (https://getcomposer.org/)

## Installation

1. Install [TON Client PHP extension](https://github.com/radianceteam/ton-client-php-ext) as described
   in [readme](https://github.com/radianceteam/ton-client-php-ext/blob/master/INSTALL.md).
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
            ->setServerAddress(getenv('TON_NETWORK_ADDRESS'))))
    ->withLogger((new Logger("demo"))
        ->pushHandler(new StreamHandler('demo.log', Logger::DEBUG)))
    ->build();
```

### Handling async events

Each module interface has `async()` function which returns asynchronous interface version. Note that some functions,
like in processing module, have async versions only.

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

Async interface also allows processing events occurred between function start and finish. This can be achieved via
calling `getEvents()` function of the returned promise. Note this blocks the current program flow until the new event
fired, or the unsubscribe function called.

```php
use TON\Abi\CallSet;
use TON\Abi\Abi_Contract;
use TON\Abi\DeploySet;
use TON\Abi\Signer_Keys;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;
use TON\Net\ParamsOfSubscribeCollection;
use TON\TestClient;
use TON\TonClientBuilder;

$client = TonClientBuilder::create()
    ->withConfig((new ClientConfig())
        ->setNetwork((new NetworkConfig())
            ->setServerAddress(getenv('TON_NETWORK_ADDRESS'))))
    ->build();

$keys = $client->crypto()->generateRandomSignKeys();

$msg = $client->abi()->encodeMessage((new ParamsOfEncodeMessage())
    ->setAbi((new Abi_Contract())
        ->setValue(TestClient::load_abi('Hello')))
    ->setDeploySet((new DeploySet())
        ->setTvc(TestClient::load_tvc('Hello')))
    ->setSigner((new Signer_Keys())->setKeys($keys))
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
    $client->net()->unsubscribe($handle);
}
```

### Other

See more examples in [demo](demo) folder.

## Docker images

All Docker images are based on `alpine` image. They contain the corresponding PHP interpreter from
the [original PHP image](https://hub.docker.com/_/php)
with [ton-client](https://github.com/radianceteam/ton-client-php-ext) extension preinstalled.

### How to use Docker images

Use [radianceteam/ton-client-php](https://hub.docker.com/r/radianceteam/ton-client-php)
as a base image in your `Dockerfile`:

```bash
FROM radianceteam/ton-client-php:1.21.3-php7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./your-script.php" ]
```

Basically, do anything you can do with the [original PHP image](https://hub.docker.com/_/php)
by just replacing `FROM php:<PHP_VERSION>-<PHP_IMAGE_VARIANT>` with
`FROM radianceteam/ton-client-php:1.21.3-php<PHP_VERSION>-<PHP_IMAGE_VARIANT>`.

Note: only `cli`, `fpm` and `zts` variants are supported ATM.

### TODO

Add `apache` variant based on Debian Buster image, as in the original PHP repo.

## Development

See [Development notes](development.md).

## License

Apache License, Version 2.0.

## Troubleshooting

Fire any question to our [Telegram channel](https://t.me/RADIANCE_TON_SDK).
