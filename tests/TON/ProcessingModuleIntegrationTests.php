<?php

namespace TON;

use TON\Abi\CallSet;
use TON\Abi\Contract;
use TON\Abi\DeploySet;
use TON\Abi\FunctionHeader;
use TON\Abi\Keys;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Processing\DidSend;
use TON\Processing\ParamsOfSendMessage;
use TON\Processing\ParamsOfWaitForTransaction;
use TON\Processing\WillFetchFirstBlock;
use TON\Processing\WillFetchNextBlock;
use TON\Processing\WillSend;

class ProcessingModuleIntegrationTests extends AbstractIntegrationTest
{
    public function testWaitForMessage()
    {
        [$abi, $tvc] = TestClient::package('Events', 2);
        $keys = $this->_client->crypto()->generateRandomSignKeys();
        $contract = (new Contract())->setValue($abi);

        $encoded = $this->_client->abi()->encodeMessage((new ParamsOfEncodeMessage())
            ->setAbi($contract)
            ->setDeploySet((new DeploySet())
                ->setTvc($tvc))
            ->setCallSet((new CallSet())
                ->setFunctionName("constructor")
                ->setHeader((new FunctionHeader())
                    ->setPubkey($keys->getPublic())))
            ->setSigner((new Keys())->setKeys($keys)));

        $this->_client->getGramsFromGiver($encoded->getAddress());

        $sendPromise = $this->_client->processing()->async()
            ->sendMessageAsync((new ParamsOfSendMessage())
                ->setMessage($encoded->getMessage())
                ->setSendEvents(true)
                ->setAbi($contract));

        $events = [];
        foreach ($sendPromise->getEvents() as $event) {
            $events[] = $event;
        }

        $result = $sendPromise->await();
        $waitPromise = $this->_client->processing()->async()
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
        $this->assertInstanceOf(WillFetchFirstBlock::class, array_shift($events));
        $this->assertInstanceOf(WillSend::class, array_shift($events));
        $this->assertInstanceOf(DidSend::class, array_shift($events));
        while ($event = array_shift($events)) {
            $this->assertInstanceOf(WillFetchNextBlock::class, $event);
        }
    }

}