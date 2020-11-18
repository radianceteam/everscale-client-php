<?php

namespace TON;

use TON\Abi\Abi;
use TON\Abi\CallSet;
use TON\Abi\Contract;
use TON\Abi\DeploySet;
use TON\Abi\Keys;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\ResultOfEncodeMessage;
use TON\Boc\ParamsOfParse;
use TON\Tvm\Account;
use TON\Tvm\ParamsOfRunExecutor;
use TON\Tvm\ParamsOfRunTvm;

class TvmModuleIntegrationTests extends AbstractIntegrationTest
{
    public function testRunExecutor()
    {
        $this->runMessage(function (ResultOfEncodeMessage $message, Abi $abi, string $account): string {
            $parsed = $this->_client->boc()->parseAccount((new ParamsOfParse())
                ->setBoc($account));

            $originalBalance = $parsed->getParsed()["balance"];

            $result = $this->_client->tvm()->runExecutor((new ParamsOfRunExecutor())
                ->setMessage($message->getMessage())
                ->setAbi($abi)
                ->setAccount((new Account())
                    ->setBoc($account)
                    ->setUnlimitedBalance(true)));

            $parsed = $this->_client->boc()->parseAccount((new ParamsOfParse())
                ->setBoc($result->getAccount()));

            $this->assertEquals(
                $originalBalance,
                $parsed->getParsed()["balance"]);

            $this->assertEquals(
                $message->getMessageId(),
                $result->getTransaction()["in_msg"]);

            $this->assertTrue($result->getFees()->getTotalAccountFees() > 0);

            return $result->getAccount();
        });
    }

    public function testRunTvm()
    {
        $this->runMessage(function (ResultOfEncodeMessage $message, Abi $abi, string $account): string {
            $result = $this->_client->tvm()->runTvm((new ParamsOfRunTvm())
                ->setMessage($message->getMessage())
                ->setAbi($abi)
                ->setAccount($account));
            return $result->getAccount();
        });
    }

    private function runMessage(callable $run)
    {
        [$abi, $tvc] = TestClient::package('Subscription');
        $keys = $this->_client->crypto()->generateRandomSignKeys();

        $contract = (new Contract())->setValue($abi);
        $wallet_address = "0:2222222222222222222222222222222222222222222222222222222222222222";

        $address = $this->_client->deployWithGiver((new ParamsOfEncodeMessage())
            ->setAbi($contract)
            ->setDeploySet((new DeploySet())->setTvc($tvc))
            ->setCallSet((new CallSet())
                ->setFunctionName("constructor")
                ->setInput(["wallet" => $wallet_address]))
            ->setSigner((new Keys())->setKeys($keys)));

        $account = $this->_client->fetchAccount($address)["boc"];

        $subscribe_params = [
            "subscriptionId" => "0x1111111111111111111111111111111111111111111111111111111111111111",
            "pubkey" => "0x2222222222222222222222222222222222222222222222222222222222222222",
            "to" => "0:3333333333333333333333333333333333333333333333333333333333333333",
            "value" => "0x123",
            "period" => "0x456"
        ];

        $message = $this->_client->abi()->encodeMessage((new ParamsOfEncodeMessage())
            ->setAddress($address)
            ->setAbi($contract)
            ->setCallSet((new CallSet())
                ->setFunctionName("subscribe")
                ->setInput($subscribe_params))
            ->setSigner((new Keys())->setKeys($keys)));

        $account = $run($message, $contract, $account);

        // check subscription

        $message = $this->_client->abi()->encodeMessage((new ParamsOfEncodeMessage())
            ->setAbi($contract)
            ->setCallSet((new CallSet())
                ->setFunctionName("getSubscription")
                ->setInput(["subscriptionId" => $subscribe_params["subscriptionId"]]))
            ->setSigner((new Keys())->setKeys($keys))
            ->setAddress($address));

        $result = $this->_client->tvm()->runTvm((new ParamsOfRunTvm())
            ->setAbi($contract)
            ->setAccount($account)
            ->setMessage($message->getMessage()));

        $this->assertEquals(
            $subscribe_params["pubkey"],
            $result->getDecoded()->getOutput()["value0"]["pubkey"]);
    }
}
