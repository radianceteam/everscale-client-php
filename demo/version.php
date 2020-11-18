<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\TonClientBuilder;

$client = TonClientBuilder::create()
    ->withLogger((new Logger(__FILE__))
        ->pushHandler(new StreamHandler(__FILE__ . '.log', Logger::DEBUG)))
    ->build();

$result = $client->client()->version();
echo "TON SDK Version: {$result->getVersion()}";

