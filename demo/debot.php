<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use TON\Abi\Abi_Contract;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer_Keys;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;
use TON\Crypto\KeyPair;
use TON\Debot\DebotAction;
use TON\Debot\ParamsOfAppDebotBrowser;
use TON\Debot\ParamsOfAppDebotBrowser_GetSigningBox;
use TON\Debot\ParamsOfAppDebotBrowser_Input;
use TON\Debot\ParamsOfAppDebotBrowser_InvokeDebot;
use TON\Debot\ParamsOfAppDebotBrowser_Log;
use TON\Debot\ParamsOfAppDebotBrowser_ShowAction;
use TON\Debot\ParamsOfAppDebotBrowser_Switch;
use TON\Debot\ParamsOfExecute;
use TON\Debot\ParamsOfFetch;
use TON\Debot\ParamsOfStart;
use TON\Debot\RegisteredDebot;
use TON\Debot\ResultOfAppDebotBrowser;
use TON\Debot\ResultOfAppDebotBrowser_GetSigningBox;
use TON\Debot\ResultOfAppDebotBrowser_Input;
use TON\Debot\ResultOfAppDebotBrowser_InvokeDebot;
use TON\TestClient;
use TON\TonClientBuilder;
use TON\TonClientInterface;

// FIXME: this demo is BROKEN as of 1.6.0.

// This demo contains example code for interaction with debot functions.
// It uses command line to interact with the user.

// Initialization code...

$logger = (new Logger(__FILE__))
    ->pushHandler(new StreamHandler('php://stdout', Logger::WARNING));

$client = TonClientBuilder::create()
    ->withConfig((new ClientConfig())
        ->setNetwork((new NetworkConfig())
            ->setServerAddress(getenv('TON_NETWORK_ADDRESS'))))
    ->withLogger($logger)
    ->build();

$keys = $client->crypto()->generateRandomSignKeys();

[$target_abi, $target_tvc] = TestClient::package('testDebotTarget');
[$debot_abi, $debot_tvc] = TestClient::package('testDebot');

$target_deploy_params = (new ParamsOfEncodeMessage())
    ->setAbi((new Abi_Contract())->setValue($target_abi))
    ->setDeploySet((new DeploySet())
        ->setTvc($target_tvc))
    ->setSigner((new Signer_Keys())->setKeys($keys))
    ->setCallSet((new CallSet())->setFunctionName('constructor'));

$target_addr = $client->abi()
    ->encodeMessage($target_deploy_params)
    ->getAddress();

TestClient::deployWithGiver($client, $target_deploy_params);

$debot_addr = TestClient::deployWithGiver($client, (new ParamsOfEncodeMessage())
    ->setAbi((new Abi_Contract())->setValue($debot_abi))
    ->setDeploySet((new DeploySet())
        ->setTvc($debot_tvc))
    ->setSigner((new Signer_Keys())->setKeys($keys))
    ->setCallSet((new CallSet())
        ->setFunctionName('constructor')
        ->setInput([
            'debotAbi' => bin2hex(json_encode($debot_abi)),
            'targetAbi' => bin2hex(json_encode($target_abi)),
            'targetAddr' => $target_addr
        ])));

echo "Debot address: ${debot_addr}\n";
echo "Target address: ${target_addr}\n";

// Invoking debot

$debot = new DemoDebot($client, $logger, $debot_addr, $keys);
$debot->start();

class DemoDebot
{
    private TonClientInterface $_client;
    private LoggerInterface $_logger;
    private string $_address;
    private KeyPair $_keys;

    private array $_actions = [];
    private bool $_finished = false;

    /**
     * DemoDebot constructor.
     * @param TonClientInterface $_client
     * @param LoggerInterface $_logger
     * @param string $_address
     * @param KeyPair $_keys
     */
    public function __construct(
        TonClientInterface $_client,
        LoggerInterface $_logger,
        string $_address,
        KeyPair $_keys)
    {
        $this->_client = $_client;
        $this->_logger = $_logger;
        $this->_address = $_address;
        $this->_keys = $_keys;
    }

    public function start()
    {
        $debot = ($this->_client->debot()->async()
            ->startAsync((new ParamsOfStart())
                ->setAddress($this->_address),
                $this->getCallback()))
            ->await();

        $this->loop($debot, function (): DebotAction {
            $actionCount = count($this->_actions);
            do {
                $actionIndex = readline("Select action (1 - {$actionCount}):");
            } while (!is_numeric($actionIndex) || !($actionIndex > 0 && $actionIndex <= $actionCount));
            return $this->_actions[$actionIndex - 1];
        });

        $this->_client->debot()->remove($debot);
    }

    public function fetch(DebotAction $action)
    {
        $debot = ($this->_client->debot()->async()
            ->fetchAsync((new ParamsOfFetch())
                ->setAddress($this->_address),
                $this->getCallback()))
            ->await();

        $this->loop($debot, function () use ($action): DebotAction {
            return $action;
        });

        $this->_client->debot()->remove($debot);
    }

    private function loop(RegisteredDebot $debot, callable $actionCallback)
    {
        while (!$this->_finished && !empty($this->_actions)) {
            $action = $actionCallback();
            $this->_logger->info("Executing action: {$action->getDescription()}");
            $this->_client->debot()->async()
                ->executeAsync((new ParamsOfExecute())
                    ->setDebotHandle($debot->getDebotHandle())
                    ->setAction($action))
                ->await();
        }
    }

    /**
     * @return Closure
     */
    private function getCallback(): Closure
    {
        return function ($request): ?ResultOfAppDebotBrowser {
            $params = ParamsOfAppDebotBrowser::create($request);
            switch (get_class($params)) {
                case ParamsOfAppDebotBrowser_Log::class:
                    echo "{$params->getMsg()}\n";
                    return null;
                case ParamsOfAppDebotBrowser_Switch::class:
                    if ($params->getContextId() === 255) { // STATE_EXIT
                        $this->_finished = true;
                    }
                    $this->_actions = [];
                    return null;
                case ParamsOfAppDebotBrowser_ShowAction::class:
                    $action = $params->getAction();
                    $this->_actions[] = $action;
                    $actionCount = count($this->_actions);
                    echo "${actionCount}: {$action->getDescription()}\n";
                    return null;
                case ParamsOfAppDebotBrowser_Input::class:
                    $value = readline($params->getPrompt());
                    return (new ResultOfAppDebotBrowser_Input())
                        ->setValue($value);
                case ParamsOfAppDebotBrowser_GetSigningBox::class:
                    $signing_box = $this->_client->crypto()->getSigningBox($this->_keys);
                    return (new ResultOfAppDebotBrowser_GetSigningBox())
                        ->setSigningBox($signing_box->getHandle());

                case ParamsOfAppDebotBrowser_InvokeDebot::class:
                    $debot = new DemoDebot($this->_client, $this->_logger, $params->getDebotAddr(), $this->_keys);
                    $debot->fetch($params->getAction());
                    return new ResultOfAppDebotBrowser_InvokeDebot();

                default:
                    throw new InvalidArgumentException("Unsupported parameter type " . get_class($params));
            }
        };
    }
}