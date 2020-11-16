<?php

namespace TON;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
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

    protected TestClient $_client;

    protected function setUp(): void
    {
        parent::setUp();

        $envVarName = self::TON_NETWORK_ADDRESS_ENV_NAME;
        $serverAddress = getenv($envVarName);

        if (empty($serverAddress)) {
            $this->markTestSkipped(<<<EOT
To enable integration tests run NodeSE locally using Docker:
docker run -d -p8888:80 tonlabs/local-node
and set ${envVarName} env variable:
(on Linux)
export ${envVarName}=http://localhost:8888
(on Windows)
set ${envVarName}=http://localhost:8888
EOT
            );
            return;
        }

        $config = (new ClientConfig())
            ->setNetwork((new NetworkConfig())
                ->setServerAddress($serverAddress));

        $logger = new Logger((new ReflectionClass($this))->getShortName());
        $logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
        $this->_client = new TestClient($config, $logger);
    }
}
