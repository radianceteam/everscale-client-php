<?php declare(strict_types=1);

namespace TON\Debot;

use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use Psr\Log\LoggerInterface;
use TON\Abi\Abi_Json;
use TON\Abi\CallSet;
use TON\Abi\ParamsOfDecodeMessageBody;
use TON\Abi\ParamsOfEncodeInternalMessage;
use TON\Boc\ParamsOfParse;
use TON\Crypto\KeyPair;
use TON\Debot\Async\AsyncRegisteredDebot;
use TON\TonClientInterface;

class TestBrowser
{
    private const DEBOT_WC = -31;
    private const SUPPORTED_INTERFACE = "f6927c0d4bdb69e1b52d27f018d156ff04152f00558042ff674f0fec32e4369d";
    private const INTERFACE_ABI = <<<EOT
{
	"ABI version": 2,
	"header": ["time"],
	"functions": [
		{
			"name": "echo",
			"inputs": [
				{"name":"answerId","type":"uint32"},
{"name":"request","type":"bytes"}
],
"outputs": [
				{"name":"response","type":"bytes"}
			]
		},
		{
            "name": "constructor",
			"inputs": [
        ],
			"outputs": [
        ]
		}
	],
	"data": [
],
	"events": [
]
}
EOT;

    private TonClientInterface $_client;
    private LoggerInterface $_logger;

    /**
     * TestBrowser constructor.
     * @param TonClientInterface $_client
     * @param LoggerInterface $_logger
     */
    public function __construct(TonClientInterface $_client, LoggerInterface $_logger)
    {
        $this->_client = $_client;
        $this->_logger = $_logger;
    }

    /**
     * @param string $address
     * @param KeyPair $keys
     * @param DebotStep[] $steps
     */
    public function execute(string $address, KeyPair $keys, array $steps)
    {
        $state = new BrowserData();
        $state->current = new CurrentStepData();
        $state->next = $steps;
        $state->keys = $keys;
        $state->address = $address;
        $state->finished = false;
        $this->execute_from_state($state, true);
    }

    /**
     * @param BrowserData $state
     * @param string $address
     * @return RegisteredDebot
     */
    private function fetch_debot(BrowserData $state, string $address): RegisteredDebot
    {
        $handle = $this->_client->debot()->async()
            ->initAsync((new ParamsOfInit())
                ->setAddress($address),
                $this->get_execute_callback($state))
            ->await();

        $state->bots[$address] = (new RegisteredDebot())
            ->setDebotHandle($handle->getDebotHandle())
            ->setDebotAbi($handle->getDebotAbi());

        return $handle;
    }

    public function execute_from_state(BrowserData $state, bool $callStart)
    {
        if ($callStart) {
            $this->_client->debot()->async()
                ->fetchAsync((new ParamsOfFetch())
                    ->setAddress($state->address));
        }

        $debot = $this->fetch_debot($state, $state->address);

        if ($callStart) {
            $this->_client->debot()->async()
                ->startAsync((new ParamsOfStart())
                    ->setDebotHandle($debot->getDebotHandle()));
        }

        while (!$state->finished) {
            $this->execute_interface_calls($debot, $state);

            $step = $state->current;
            $step->step = array_shift($state->next);
            $step->outputs = [];
            $action = $step->available_actions[$step->step->choice - 1];

            $this->_logger->info("Executing action: {$action->getName()}");
            $this->_client->debot()->async()
                ->executeAsync((new ParamsOfExecute())
                    ->setDebotHandle($debot->getDebotHandle())
                    ->setAction($action))
                ->await();

            $step = $state->current;

            Assert::assertEquals(count($step->outputs), count($step->step->outputs));
            foreach (array_map(null, $step->outputs, $step->step->outputs) as $arr) {
                $pos = strpos($arr[1], '{}');
                $transformed = array_map(function ($value) use ($pos) {
                    return ($pos !== false) ? substr($value, 0, $pos) : $value;
                }, $arr);
                $unique = array_unique($transformed);
                Assert::assertEquals(1, count($unique));
            }

            Assert::assertEmpty($step->step->inputs);
            Assert::assertEmpty($step->step->invokes);

            if (empty($step->available_actions)) {
                break;
            }
        }

        Assert::assertEmpty($state->next);

        $this->_client->debot()->remove((new ParamsOfRemove())
            ->setDebotHandle($debot->getDebotHandle()));
    }

    public function get_execute_callback(BrowserData $state): callable
    {
        return function ($request) use ($state): ?ResultOfAppDebotBrowser {
            $params = ParamsOfAppDebotBrowser::create($request);
            switch (get_class($params)) {
                case ParamsOfAppDebotBrowser_Log::class:
                    $state->current->outputs[] = $params->getMsg();
                    return null;
                case ParamsOfAppDebotBrowser_Switch::class:
                    Assert::assertFalse($state->switch_started);
                    $state->switch_started = true;
                    if ($params->getContextId() === 255) { // STATE_EXIT
                        $state->finished = true;
                    }
                    $state->current->available_actions = [];
                    return null;
                case ParamsOfAppDebotBrowser_SwitchCompleted::class:
                    Assert::assertTrue($state->switch_started);
                    $state->switch_started = false;
                    return null;
                case ParamsOfAppDebotBrowser_ShowAction::class:
                    $state->current->available_actions[] = $params->getAction();
                    return null;
                case ParamsOfAppDebotBrowser_Send::class:
                    array_push($state->msg_queue, $params->getMessage());
                    return null;
                case ParamsOfAppDebotBrowser_Input::class:
                    $value = array_shift($state->current->step->inputs);
                    return (new ResultOfAppDebotBrowser_Input())
                        ->setValue($value);
                case ParamsOfAppDebotBrowser_GetSigningBox::class:
                    $signing_box = $this->_client->crypto()->getSigningBox($state->keys);
                    return (new ResultOfAppDebotBrowser_GetSigningBox())
                        ->setSigningBox($signing_box->getHandle());
                case ParamsOfAppDebotBrowser_InvokeDebot::class:
                    $steps = array_shift($state->current->step->invokes);
                    $steps[0]->choice = 1;

                    $newState = new BrowserData();
                    $newState->current = new CurrentStepData();
                    $newState->current->available_actions = [$params->getAction()];
                    $newState->next = $steps;
                    $newState->keys = $state->keys;
                    $newState->address = $params->getDebotAddr();
                    $newState->finished = false;

                    $this->execute_from_state($newState, false);

                    return new ResultOfAppDebotBrowser_InvokeDebot();

                default:
                    throw new InvalidArgumentException("Unsupported parameter type " . get_class($params));
            }
        };
    }

    private function execute_interface_calls(RegisteredDebot $debot, BrowserData $data)
    {
        while (count($data->msg_queue) > 0) {
            $msg = array_pop($data->msg_queue);
            $parsed = $this->_client->boc()->parseMessage((new ParamsOfParse())
                ->setBoc($msg));

            $body = $parsed->getParsed()["body"];
            $destAddr = $parsed->getParsed()["dst"];
            $srcAddr = $parsed->getParsed()["src"];
            $wcAndAddr = explode(':', $destAddr);
            $wc = (int)$wcAndAddr[0];

            if ($wc == self::DEBOT_WC) {
                $interfaceId = $wcAndAddr[1];
                Assert::assertEquals(self::SUPPORTED_INTERFACE, $interfaceId);

                $decoded = $this->_client->abi()->decodeMessageBody((new ParamsOfDecodeMessageBody())
                    ->setAbi((new Abi_Json())->setValue(self::INTERFACE_ABI))
                    ->setBody($body)
                    ->setIsInternal(true));

                $this->_logger->info("call for interface id ${interfaceId}");
                $this->_logger->info("request: {$decoded->getName()} (" . json_encode($decoded->getValue()) . ")");

                [$funcId, $returnArgs] = DebotEcho::call($decoded->getName(), $decoded->getValue());
                $this->_logger->info("response: {$funcId} (" . json_encode($returnArgs) . ")");

                $srcDebot = $this->getDebot($data, $srcAddr);
                Assert::assertNotEmpty($srcDebot);

                $message = $this->_client->abi()
                    ->encodeInternalMessage((new ParamsOfEncodeInternalMessage())
                        ->setAbi((new Abi_Json())->setValue($srcDebot->getDebotAbi()))
                        ->setAddress($srcAddr)
                        ->setCallSet($funcId == 0
                            ? null
                            : (new CallSet())->setFunctionName("0x" . dechex($funcId))
                                ->setInput($returnArgs))
                        ->setValue('1000000000000000'))
                    ->getMessage();

                $this->_client->debot()->send((new ParamsOfSend())
                    ->setDebotHandle($debot->getDebotHandle())
                    ->setMessage($message));

            } else {

                if (!array_key_exists($destAddr, $data->bots)) {
                    $this->fetch_debot($data, $destAddr);
                }

                $this->_client->debot()->send((new ParamsOfSend())
                    ->setDebotHandle($debot->getDebotHandle())
                    ->setMessage($msg));
            }
        }
    }

    private function getDebot(BrowserData $data, string $address): RegisteredDebot
    {
        return $data->bots[$address];
    }
}