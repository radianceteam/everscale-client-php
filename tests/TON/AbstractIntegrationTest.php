<?php

namespace TON;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;

/**
 * Integration test that depends on local NodeSE running.
 * @package TON
 */
abstract class AbstractIntegrationTest extends TestCase
{
    private const TON_NETWORK_ADDRESS_ENV_NAME = 'TON_NETWORK_ADDRESS';

    protected static LoggerInterface $logger;
    protected static TonClientInterface $client;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $envVarName = self::TON_NETWORK_ADDRESS_ENV_NAME;
        if (empty(getenv($envVarName))) {
            self::markTestSkipped(<<<EOT
To enable integration tests run NodeSE locally using Docker:
docker run -d -p8888:80 tonlabs/local-node
and set ${envVarName} env variable:
(on Linux)
export ${envVarName}=http://localhost:8888
(on Windows)
set ${envVarName}=http://localhost:8888
EOT
            );
        } else {
            self::$logger = new Logger((new ReflectionClass(self::class))->getShortName());
            self::$logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
            self::$client = self::createClient();
        }
    }

    protected static function createClient(): TonClientInterface
    {
        $config = (new ClientConfig())
            ->setNetwork((new NetworkConfig())
                ->setServerAddress(getenv(self::TON_NETWORK_ADDRESS_ENV_NAME)));

        return TonClientBuilder::create()
            ->withConfig($config)
            ->withLogger(self::$logger)
            ->build();
    }
}
