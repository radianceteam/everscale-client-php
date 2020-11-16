<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\TonClient;

$client = new TonClient(null,
    (new Logger("demo"))
        ->pushHandler(new StreamHandler('demo.log', Logger::DEBUG)));

$result = $client->client()->version();
echo "TON SDK Version: {$result->getVersion()}";

