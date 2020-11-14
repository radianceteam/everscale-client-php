<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TON\TonClient;

$logger = new Logger("demo");
$logger->pushHandler(new StreamHandler('demo.log', Logger::DEBUG));

$client = new TonClient();
$client->setLogger($logger);

$result = $client->client()->version();
echo "TON SDK Version: {$result->getVersion()}";
