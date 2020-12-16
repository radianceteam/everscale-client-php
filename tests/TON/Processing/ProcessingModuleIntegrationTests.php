<?php declare(strict_types=1);

namespace TON\Processing;

use TON\Abi\Abi_Contract;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\FunctionHeader;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer_Keys;
use TON\AbstractIntegrationTest;
use TON\TestClient;

class ProcessingModuleIntegrationTests extends AbstractIntegrationTest
{
    public function testWaitForMessage()
    {
        [$abi, $tvc] = TestClient::package('Events', 2);
        $keys = self::$client->crypto()->generateRandomSignKeys();
        $contract = (new Abi_Contract())->setValue($abi);

        $encoded = self::$client->abi()->encodeMessage((new ParamsOfEncodeMessage())
            ->setAbi($contract)
            ->setDeploySet((new DeploySet())
                ->setTvc($tvc))
            ->setCallSet((new CallSet())
                ->setFunctionName("constructor")
                ->setHeader((new FunctionHeader())
                    ->setPubkey($keys->getPublic())))
            ->setSigner((new Signer_Keys())->setKeys($keys)));

        TestClient::getGramsFromGiver(self::$client, $encoded->getAddress());

        $sendPromise = self::$client->processing()->async()
            ->sendMessageAsync((new ParamsOfSendMessage())
                ->setMessage($encoded->getMessage())
                ->setSendEvents(true)
                ->setAbi($contract));

        $events = [];
        foreach ($sendPromise->getEvents() as $event) {
            $events[] = $event;
        }

        $result = $sendPromise->await();
        $waitPromise = self::$client->processing()->async()
            ->waitForTransactionAsync((new ParamsOfWaitForTransaction())
                ->setMessage($encoded->getMessage())
                ->setShardBlockId($result->getShardBlockId())
                ->setSendEvents(true)
                ->setAbi($contract));

        foreach ($waitPromise->getEvents() as $event) {
            $events[] = $event;
        }

        $output = $waitPromise->await();
        $this->assertCount(0, $output->getDecoded()->getOutMessages());
        $this->assertNull($output->getDecoded()->getOutput());

        $this->assertTrue(sizeof($events) > 3);
        $this->assertInstanceOf(ProcessingEvent_WillFetchFirstBlock::class, array_shift($events));
        $this->assertInstanceOf(ProcessingEvent_WillSend::class, array_shift($events));
        $this->assertInstanceOf(ProcessingEvent_DidSend::class, array_shift($events));
        while ($event = array_shift($events)) {
            $this->assertInstanceOf(ProcessingEvent_WillFetchNextBlock::class, $event);
        }
    }
}