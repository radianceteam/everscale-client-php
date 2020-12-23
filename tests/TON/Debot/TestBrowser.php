<?php declare(strict_types=1);

namespace TON\Debot;

use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use Psr\Log\LoggerInterface;
use TON\Crypto\KeyPair;
use TON\Debot\Async\AsyncRegisteredDebot;
use TON\TonClientInterface;

class TestBrowser
{
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

        $this->execute_from_state($state, function (string $address, callable $callback): AsyncRegisteredDebot {
            return $this->_client->debot()->async()
                ->startAsync((new ParamsOfStart())
                    ->setAddress($address),
                    $callback);
        });
    }

    public function execute_from_state(BrowserData $state, callable $start_function)
    {
        $debot = $this->start_debot($state, $start_function)->await();

        while (!$state->finished) {
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

        $this->_client->debot()->remove($debot);
    }

    public function start_debot(BrowserData $state, callable $start_function): AsyncRegisteredDebot
    {
        return $start_function($state->address, function ($request) use ($state): ?ResultOfAppDebotBrowser {
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

                    $this->execute_from_state($newState, function (string $address, callable $callback): AsyncRegisteredDebot {
                        return $this->_client->debot()->async()
                            ->fetchAsync((new ParamsOfFetch())
                                ->setAddress($address),
                                $callback);
                    });

                    return new ResultOfAppDebotBrowser_InvokeDebot();

                default:
                    throw new InvalidArgumentException("Unsupported parameter type " . get_class($params));
            }
        });
    }
}