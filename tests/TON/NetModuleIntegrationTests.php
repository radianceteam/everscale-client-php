<?php

namespace TON;

use TON\Net\ParamsOfQueryCollection;
use TON\Net\ParamsOfWaitForCollection;

class NetModuleIntegrationTests extends AbstractIntegrationTest
{
    public function testQueryCollection_blocks_signatures()
    {
        $result = $this->_client->net()->queryCollection((new ParamsOfQueryCollection())
            ->setCollection("blocks_signatures")
            ->setResult("id")
            ->setLimit(1));

        $this->assertNotNull($result);
    }

    public function testQueryCollection_accounts()
    {
        $accounts = $this->_client->net()->queryCollection((new ParamsOfQueryCollection())
            ->setCollection("accounts")
            ->setResult("id balance"));

        $this->assertTrue(!empty($accounts->getResult()));
    }

    public function testQueryCollection_ranges()
    {
        $messages = $this->_client->net()->queryCollection((new ParamsOfQueryCollection())
            ->setCollection("messages")
            ->setFilter([
                "created_at" => ["gt" => 1562342740]
            ])
            ->setResult("body created_at"));

        $this->assertTrue(((int)$messages->getResult()[0]["created_at"]) > 1562342740);
    }

    public function testWaitForCollection()
    {
        if (!function_exists('pcntl_fork')) {
            $this->markTestSkipped("This test requires pcntl_fork() function and can only be run on POSIX-compliant OS.");
            return;
        }

        $now = time();

        $pid = pcntl_fork();
        $this->assertNotEquals(-1, $pid);

        if ($pid) {

            // main process - wait for collection
            $transactions = $this->_client->net()->waitForCollection(
                (new ParamsOfWaitForCollection())
                    ->setCollection("transactions")
                    ->setFilter(["now" => ["gt" => $now]])
                    ->setResult("id now"));

            pcntl_wait($status);

            $this->assertTrue(pcntl_wifexited($status));
            $this->assertTrue(((int)$transactions->getResult()["now"]) > $now);

        } else {

            // child process - get grams from giver
            $this->_client->getGramsFromGiver(TestClient::GIVER_ADDRESS);
        }
    }
}