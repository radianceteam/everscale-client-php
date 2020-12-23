<?php declare(strict_types=1);

namespace TON\Net;

use TON\Abi\Abi_Contract;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer_Keys;
use TON\AbstractIntegrationTest;
use TON\Processing\ParamsOfProcessMessage;
use TON\TestClient;

class NetModuleIntegrationTests extends AbstractIntegrationTest
{
    public function testQueryCollection_blocks_signatures()
    {
        $result = self::$client->net()->queryCollection((new ParamsOfQueryCollection())
            ->setCollection("blocks_signatures")
            ->setResult("id")
            ->setLimit(1));

        $this->assertNotNull($result);
    }

    public function testQueryCollection_blocks_signatures_async()
    {
        $result = self::$client->net()->async()->queryCollectionAsync((new ParamsOfQueryCollection())
            ->setCollection("blocks_signatures")
            ->setResult("id")
            ->setLimit(1))
            ->await();

        $this->assertNotNull($result);
    }

    public function testQueryCollection_accounts()
    {
        $accounts = self::$client->net()->queryCollection((new ParamsOfQueryCollection())
            ->setCollection("accounts")
            ->setResult("id balance"));

        $this->assertTrue(!empty($accounts->getResult()));
    }

    public function testQueryCollection_accounts_async()
    {
        $accounts = self::$client->net()->async()->queryCollectionAsync((new ParamsOfQueryCollection())
            ->setCollection("accounts")
            ->setResult("id balance"))
            ->await();

        $this->assertTrue(!empty($accounts->getResult()));
    }

    public function testQueryCollection_ranges()
    {
        $messages = self::$client->net()->queryCollection((new ParamsOfQueryCollection())
            ->setCollection("messages")
            ->setFilter([
                "created_at" => ["gt" => 1562342740]
            ])
            ->setResult("body created_at"));

        $this->assertTrue(((int)$messages->getResult()[0]["created_at"]) > 1562342740);
    }

    public function testQueryCollection_ranges_async()
    {
        $messages = self::$client->net()->async()->queryCollectionAsync((new ParamsOfQueryCollection())
            ->setCollection("messages")
            ->setFilter([
                "created_at" => ["gt" => 1562342740]
            ])
            ->setResult("body created_at"))
            ->await();

        $this->assertTrue(((int)$messages->getResult()[0]["created_at"]) > 1562342740);
    }

    public function testWaitForCollection()
    {
        $now = time();

        // here's the beauty of the natural async method
        // do processing in background
        $transactionsPromise = self::$client->net()->async()
            ->waitForCollectionAsync(
                (new ParamsOfWaitForCollection())
                    ->setCollection("transactions")
                    ->setFilter(["now" => ["gt" => $now]])
                    ->setResult("id now"));

        sleep(1);

        TestClient::getGramsFromGiver(self::$client, TestClient::GIVER_ADDRESS);

        $transactions = $transactionsPromise->await();
        $this->assertNotNull($transactions);
        $this->assertNotNull($transactions->getResult());
        $this->assertTrue(((int)$transactions->getResult()["now"]) > $now);
    }

    public function testSubscribeToTransactionsWithAddress()
    {
        $keys = self::$client->crypto()->generateRandomSignKeys();

        $deployParams = (new ParamsOfEncodeMessage())
            ->setAbi((new Abi_Contract())
                ->setValue(TestClient::load_abi('Hello')))
            ->setDeploySet((new DeploySet())
                ->setTvc(TestClient::load_tvc('Hello')))
            ->setSigner((new Signer_Keys())->setKeys($keys))
            ->setCallSet((new CallSet())
                ->setFunctionName("constructor"));

        $msg = self::$client->abi()->encodeMessage($deployParams);

        $subscribePromise = self::$client->net()->async()
            ->subscribeCollectionAsync((new ParamsOfSubscribeCollection())
                ->setCollection("transactions")
                ->setFilter([
                    "account_addr" => ["eq" => $msg->getAddress()],
                    "status" => ["eq" => 3] // Finalized
                ])
                ->setResult("id account_addr"));

        $this->assertNotNull($subscribePromise);
        $handle = $subscribePromise->await();

        TestClient::deployWithGiver(self::$client, $deployParams);

        $transactions = [];
        $i = 0;
        foreach ($subscribePromise->getEvents() as $event) {
            $transactions[] = $event;
            if (++$i == 2) {
                self::$client->net()->async()
                    ->unsubscribeAsync($handle)
                    ->await();
            }
        }

        $this->assertCount(2, $transactions);
        $t1 = $transactions[0]["result"];
        $t2 = $transactions[1]["result"];
        $this->assertEquals($msg->getAddress(), $t1["account_addr"]);
        $this->assertEquals($msg->getAddress(), $t2["account_addr"]);
        $this->assertNotEmpty($t1["id"]);
        $this->assertNotEmpty($t2["id"]);
        $this->assertNotEquals($t1["id"], $t2["id"]);
    }

    public function testQuery()
    {
        $info = self::$client->net()->query((new ParamsOfQuery())
            ->setQuery('query{info{version}}'));

        $version = $info->getResult()["data"]["info"]["version"];
        $this->assertEquals(3, count(explode('.', $version)));
    }

    public function testQuery_async()
    {
        $info = self::$client->net()->async()
            ->queryAsync((new ParamsOfQuery())
                ->setQuery('query{info{version}}'))
            ->await();

        $version = $info->getResult()["data"]["info"]["version"];
        $this->assertEquals(3, count(explode('.', $version)));
    }

    public function testSuspendResume()
    {
        $keys = self::$client->crypto()->generateRandomSignKeys();
        [$abi, $tvc] = TestClient::package('Hello');

        $deployParams = (new ParamsOfEncodeMessage())
            ->setAbi((new Abi_Contract())->setValue($abi))
            ->setDeploySet((new DeploySet())->setTvc($tvc))
            ->setSigner((new Signer_Keys())->setKeys($keys))
            ->setCallSet((new CallSet())->setFunctionName("constructor"));

        $msg = self::$client->abi()->encodeMessage($deployParams);

        $subscription_client = self::createClient();
        $subscribePromise = $subscription_client->net()->async()
            ->subscribeCollectionAsync((new ParamsOfSubscribeCollection())
                ->setCollection("transactions")
                ->setFilter([
                    "account_addr" => ["eq" => $msg->getAddress()],
                    "status" => ["eq" => 3] // Finalized
                ])
                ->setResult("id account_addr"));

        $this->assertNotNull($subscribePromise);
        $handle = $subscribePromise->await();

        TestClient::getGramsFromGiver(self::$client, $msg->getAddress());

        sleep(1);
        $transactions = [];
        foreach ($subscribePromise->getEvents(0) as $event) {
            $transactions[] = $event;
        }

        $this->assertCount(1, $transactions);

        // suspend subscription
        $subscription_client->net()->suspend();

        // deploy to create second transaction
        self::$client->processing()->async()
            ->processMessageAsync((new ParamsOfProcessMessage())
                ->setMessageEncodeParams($deployParams))
            ->await();

        // check that second transaction is not received when subscription suspended
        sleep(1);
        foreach ($subscribePromise->getEvents(0) as $event) {
            $transactions[] = $event;
        }

        $this->assertCount(1, $transactions);

        // resume subscription
        $subscription_client->net()->resume();

        // run contract function to create new transaction
        self::$client->processing()->async()
            ->processMessageAsync((new ParamsOfProcessMessage())
                ->setMessageEncodeParams((new ParamsOfEncodeMessage())
                    ->setAbi((new Abi_Contract())->setValue($abi))
                    ->setAddress($msg->getAddress())
                    ->setSigner((new Signer_Keys())->setKeys($keys))
                    ->setCallSet((new CallSet())
                        ->setFunctionName("touch")))
                ->setSendEvents(false))
            ->await();

        sleep(1);
        foreach ($subscribePromise->getEvents(0) as $event) {
            $transactions[] = $event;
        }

        $transaction_ids = array_map(function ($t) {
            return $t["result"]["id"];
        }, $transactions);
        var_dump($transactions);
        $this->assertCount(2, array_unique($transaction_ids));

        $subscription_client->net()->unsubscribe($handle);
    }

    public function testFindLastShardBlock()
    {
        $block = self::$client->net()
            ->findLastShardBlock((new ParamsOfFindLastShardBlock())
                ->setAddress(TestClient::GIVER_ADDRESS));

        $this->assertNotEmpty($block);
        $this->assertNotEmpty($block->getBlockId());
    }

    public function testFindLastShardBlock_async()
    {
        $block = self::$client->net()->async()
            ->findLastShardBlockAsync((new ParamsOfFindLastShardBlock())
                ->setAddress(TestClient::GIVER_ADDRESS))
            ->await();

        $this->assertNotEmpty($block);
        $this->assertNotEmpty($block->getBlockId());
    }
}