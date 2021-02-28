<?php declare(strict_types=1);

namespace TON\Net;

use TON\Abi\Abi_Contract;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer_Keys;
use TON\AbstractIntegrationTest;
use TON\Client\ClientConfig;
use TON\Client\NetworkConfig;
use TON\Processing\ParamsOfProcessMessage;
use TON\TestClient;
use TON\TonClientBuilder;

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

    public function testQueryCollection_blocks_signaturesAsync()
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

    public function testQueryCollection_accountsAsync()
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

    public function testQueryCollection_rangesAsync()
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

    public function testQueryAsync()
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
        $subscription_client = self::createClient();
        $keys = $subscription_client->crypto()->generateRandomSignKeys();

        [$abi, $tvc] = TestClient::package('Hello');

        $deployParams = (new ParamsOfEncodeMessage())
            ->setAbi((new Abi_Contract())->setValue($abi))
            ->setDeploySet((new DeploySet())->setTvc($tvc))
            ->setSigner((new Signer_Keys())->setKeys($keys))
            ->setCallSet((new CallSet())->setFunctionName("constructor"));

        $msg = $subscription_client->abi()->encodeMessage($deployParams);

        $subscribePromise = $subscription_client->net()->async()
            ->subscribeCollectionAsync((new ParamsOfSubscribeCollection())
                ->setCollection("transactions")
                ->setFilter([
                    "account_addr" => ["eq" => $msg->getAddress()],
                    "status" => ["eq" => 3] // Finalized
                ])
                ->setResult("id account_addr"));
        $handle = $subscribePromise->await();

        // send grams to create first transaction
        TestClient::getGramsFromGiver(self::$client, $msg->getAddress());

        // give some time for subscription to receive all data
        sleep(1);

        $events = AsyncCollectionEvents::read($subscribePromise);
        // check that transaction is received
        $this->assertEquals(1, $events->getTransactionCount());
        // and no error notifications
        $this->assertEquals(0, $events->getNotificationCount());

        // suspend subscription
        $subscription_client->net()->suspend();

        // deploy to create second transaction
        self::$client->processing()->async()
            ->processMessageAsync((new ParamsOfProcessMessage())
                ->setMessageEncodeParams($deployParams)
                ->setSendEvents(false))
            ->await();

        // create second subscription while network is suspended
        $subscribePromise2 = $subscription_client->net()->async()
            ->subscribeCollectionAsync((new ParamsOfSubscribeCollection())
                ->setCollection("transactions")
                ->setFilter([
                    "account_addr" => ["eq" => $msg->getAddress()],
                    "status" => ["eq" => 3] // Finalized
                ])
                ->setResult("id account_addr"));
        $handle2 = $subscribePromise2->await();

        // give some time for subscription to receive all data
        sleep(1);

        // check that second transaction is not received when subscription suspended
        foreach ([$subscribePromise, $subscribePromise2] as $promise) {
            $events = AsyncCollectionEvents::read($promise);
            $this->assertEquals(0, $events->getTransactionCount());
            $this->assertEquals(1, $events->getNotificationCount());
            $this->assertEquals([NetErrorCode::NetworkModuleSuspended], $events->getNotificationCodes());
        }

        // resume subscription
        $subscription_client->net()->resume();

        // run contract function to create new transaction
        $subscription_client->processing()->async()
            ->processMessageAsync((new ParamsOfProcessMessage())
                ->setMessageEncodeParams((new ParamsOfEncodeMessage())
                    ->setAbi((new Abi_Contract())->setValue($abi))
                    ->setAddress($msg->getAddress())
                    ->setSigner((new Signer_Keys())->setKeys($keys))
                    ->setCallSet((new CallSet())
                        ->setFunctionName("touch")))
                ->setSendEvents(false))
            ->await();

        // give some time for subscription to receive all data
        sleep(5);

        // check that third transaction is now received after resume
        foreach ([$subscribePromise, $subscribePromise2] as $promise) {
            $events = AsyncCollectionEvents::read($promise);
            $this->assertEquals(1, $events->getTransactionCount());
            $this->assertEquals(1, $events->getNotificationCount());
            $this->assertEquals([NetErrorCode::NetworkModuleResumed], $events->getNotificationCodes());
        }

        $subscription_client->net()->unsubscribe($handle);
        $subscription_client->net()->unsubscribe($handle2);
    }

    public function testFindLastShardBlock()
    {
        $block = self::$client->net()
            ->findLastShardBlock((new ParamsOfFindLastShardBlock())
                ->setAddress(TestClient::GIVER_ADDRESS));

        $this->assertNotEmpty($block);
        $this->assertNotEmpty($block->getBlockId());
    }

    public function testFindLastShardBlockAsync()
    {
        $block = self::$client->net()->async()
            ->findLastShardBlockAsync((new ParamsOfFindLastShardBlock())
                ->setAddress(TestClient::GIVER_ADDRESS))
            ->await();

        $this->assertNotEmpty($block);
        $this->assertNotEmpty($block->getBlockId());
    }

    /**
     * Disabled since TON SDK 1.9.0
     * @group ignore
     */
    public function testFetchEndpoints()
    {
        $client = TonClientBuilder::create()
            ->withConfig((new ClientConfig())
                ->setNetwork((new NetworkConfig())
                    ->setEndpoints(["cinet.tonlabs.io", "cinet2.tonlabs.io/"])))
            ->build();

        $result = $client->net()->fetchEndpoints();
        $this->assertNotNull($result);
        $endpoints = $result->getEndpoints();
        $this->assertNotEmpty($endpoints);
        $this->assertCount(2, $endpoints);
        $this->assertContains("https://cinet.tonlabs.io/", $endpoints);
        $this->assertContains("https://cinet2.tonlabs.io/", $endpoints);
    }

    /**
     * Disabled since TON SDK 1.9.0
     * @group ignore
     */
    public function testFetchEndpointsAsync()
    {
        $client = TonClientBuilder::create()
            ->withConfig((new ClientConfig())
                ->setNetwork((new NetworkConfig())
                    ->setEndpoints(["cinet.tonlabs.io", "cinet2.tonlabs.io/"])))
            ->build();

        $result = $client->net()->async()
            ->fetchEndpointsAsync()
            ->await();

        $this->assertNotNull($result);
        $endpoints = $result->getEndpoints();
        $this->assertNotEmpty($endpoints);
        $this->assertCount(2, $endpoints);
        $this->assertContains("https://cinet.tonlabs.io/", $endpoints);
        $this->assertContains("https://cinet2.tonlabs.io/", $endpoints);
    }

    /**
     * Disabled since TON SDK 1.9.0
     * @group ignore
     */
    public function testSetEndpoints()
    {
        $client = self::createClient();

        $client->net()->setEndpoints((new EndpointsSet())
            ->setEndpoints(["cinet.tonlabs.io", "cinet2.tonlabs.io/"]));

        $result = $client->net()->fetchEndpoints();
        $this->assertNotNull($result);
        $endpoints = $result->getEndpoints();
        $this->assertNotEmpty($endpoints);
        $this->assertCount(2, $endpoints);
        $this->assertContains("https://cinet.tonlabs.io/", $endpoints);
        $this->assertContains("https://cinet2.tonlabs.io/", $endpoints);
    }

    /**
     * Disabled since TON SDK 1.9.0
     * @group ignore
     */
    public function testSetEndpointsAsync()
    {
        $client = self::createClient();

        $client->net()->async()
            ->setEndpointsAsync((new EndpointsSet())
                ->setEndpoints(["cinet.tonlabs.io", "cinet2.tonlabs.io/"]))
            ->await();

        $result = $client->net()->async()
            ->fetchEndpointsAsync()
            ->await();

        $this->assertNotNull($result);
        $endpoints = $result->getEndpoints();
        $this->assertNotEmpty($endpoints);
        $this->assertCount(2, $endpoints);
        $this->assertContains("https://cinet.tonlabs.io/", $endpoints);
        $this->assertContains("https://cinet2.tonlabs.io/", $endpoints);
    }

    public function testBatchQuery()
    {
        $client = self::createClient();

        $batch = $client->net()->batchQuery((new ParamsOfBatchQuery())
            ->setOperations([
                (new ParamsOfQueryOperation_QueryCollection())
                    ->setCollection('blocks_signatures')
                    ->setResult('id')
                    ->setLimit(1),
                (new ParamsOfQueryOperation_AggregateCollection())
                    ->setCollection('accounts')
                    ->setFields([
                        (new FieldAggregation())
                            ->setField('')
                            ->setFn(AggregationFn::COUNT)
                    ]),
                (new ParamsOfQueryOperation_WaitForCollection())
                    ->setCollection('transactions')
                    ->setFilter(['now' => ['gt' => 20]])
                    ->setResult('id now')
            ]));

        $this->assertCount(3, $batch->getResults());
    }

    public function testAsyncBatchQuery()
    {
        $client = self::createClient();

        $batch = $client->net()->async()->batchQueryAsync((new ParamsOfBatchQuery())
            ->setOperations([
                (new ParamsOfQueryOperation_QueryCollection())
                    ->setCollection('blocks_signatures')
                    ->setResult('id')
                    ->setLimit(1),
                (new ParamsOfQueryOperation_AggregateCollection())
                    ->setCollection('accounts')
                    ->setFields([
                        (new FieldAggregation())
                            ->setField('')
                            ->setFn(AggregationFn::COUNT)
                    ]),
                (new ParamsOfQueryOperation_WaitForCollection())
                    ->setCollection('transactions')
                    ->setFilter(['now' => ['gt' => 20]])
                    ->setResult('id now')
            ]))->await();

        $this->assertCount(3, $batch->getResults());
    }

    public function testAggregates()
    {
        $client = self::createClient();

        $result = $client->net()->aggregateCollection((new ParamsOfAggregateCollection())
            ->setCollection('accounts')
            ->setFields([
                (new FieldAggregation())
                    ->setField('')
                    ->setFn(AggregationFn::COUNT)
            ]));

        $count = $result->getValues()[0];
        $this->assertGreaterThan(0, $count);
    }

    public function testAsyncAggregates()
    {
        $client = self::createClient();

        $result = $client->net()->async()->aggregateCollectionAsync((new ParamsOfAggregateCollection())
            ->setCollection('accounts')
            ->setFields([
                (new FieldAggregation())
                    ->setField('')
                    ->setFn(AggregationFn::COUNT)
            ]))->await();

        $count = $result->getValues()[0];
        $this->assertGreaterThan(0, $count);
    }
}