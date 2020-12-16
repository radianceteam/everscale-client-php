<?php

namespace TON;

use RuntimeException;
use TON\Abi\Abi;
use TON\Abi\Abi_Contract;
use TON\Abi\AbiContract;
use TON\Abi\CallSet;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer;
use TON\Abi\Signer_None;
use TON\Boc\ParamsOfParse;
use TON\Net\ParamsOfWaitForCollection;
use TON\Processing\ParamsOfProcessMessage;
use TON\Processing\ResultOfProcessMessage;

class TestClient
{
    public const DEFAULT_ABI_VERSION = 2;

    public const GIVER_ADDRESS = "0:841288ed3b55d9cdafa806807f02a0ae0c169aa5edfe88a789a6482429756a94";

    public static function deployWithGiver(TonClientInterface $client, ParamsOfEncodeMessage $params, ?int $value = null): string
    {
        $msg = $client->abi()->encodeMessage($params);
        self::getGramsFromGiver($client, $msg->getAddress(), $value);
        $client->processing()->async()
            ->processMessageAsync((new ParamsOfProcessMessage())
                ->setMessageEncodeParams($params)
                ->setSendEvents(false))
            ->await();
        return $msg->getAddress();
    }

    public static function getGramsFromGiver(TonClientInterface $client, string $account, ?int $value = null): void
    {
        $run_result = self::netProcessFunction(
            $client,
            self::GIVER_ADDRESS,
            self::giver_abi(),
            "sendGrams",
            [
                "dest" => $account,
                "amount" => $value ?? 500000000
            ],
            new Signer_None());

        foreach ($run_result->getOutMessages() as $message) {
            $parsed = $client->boc()->parseMessage((new ParamsOfParse())
                ->setBoc($message));

            $message = $parsed->getParsed();

            if ('Internal' === $message['msg_type']) {
                $client->net()->waitForCollection((new ParamsOfWaitForCollection())
                    ->setCollection("transactions")
                    ->setFilter([
                        "in_msg" => ["eq" => $message["id"]]
                    ])
                    ->setResult("id"));
            }
        }
    }

    public static function netProcessFunction(
        TonClientInterface $client,
        string $address,
        Abi $abi,
        string $function_name,
        array $input,
        Signer $signer): ResultOfProcessMessage
    {
        return $client->processing()->async()
            ->processMessageAsync(
                (new ParamsOfProcessMessage())
                    ->setMessageEncodeParams((new ParamsOfEncodeMessage())
                        ->setAddress($address)
                        ->setAbi($abi)
                        ->setCallSet((new CallSet())
                            ->setFunctionName($function_name)
                            ->setInput($input))
                        ->setSigner($signer))
                    ->setSendEvents(false))
            ->await();
    }

    public static function fetchAccount(TonClientInterface $client, string $address): array
    {
        return $client->net()->waitForCollection(
            (new ParamsOfWaitForCollection())
                ->setCollection("accounts")
                ->setFilter([
                    "id" => ["eq" => $address]
                ])
                ->setResult("id boc"))
            ->getResult();
    }

    public static function load_abi(string $name, int $version = self::DEFAULT_ABI_VERSION): AbiContract
    {
        return new AbiContract(json_decode(self::read_file("contracts/abi_v${version}/${name}.abi.json"), true));
    }

    public static function load_tvc(string $name, int $version = self::DEFAULT_ABI_VERSION): string
    {
        return base64_encode(self::read_file(
            "contracts/abi_v${version}/${name}.tvc"));
    }

    /**
     * @param string $name
     * @param int $version
     * @return array
     */
    public static function package(string $name, int $version = self::DEFAULT_ABI_VERSION): array
    {
        return [
            self::load_abi($name, $version),
            self::load_tvc($name, $version)
        ];
    }

    private static function read_file(string $file_name): string
    {
        $contents = file_get_contents(__DIR__ . '/../' . $file_name);
        if (!$contents) {
            throw new RuntimeException("File not found: ${file_name}");
        }
        return $contents;
    }

    public static function giver_abi(): Abi
    {
        $abi = self::load_abi('Giver', 1);
        return (new Abi_Contract())->setValue($abi);
    }
}
