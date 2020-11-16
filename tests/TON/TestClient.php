<?php

namespace TON;

use RuntimeException;
use TON\Abi\Abi;
use TON\Abi\AbiContract;
use TON\Abi\CallSet;
use TON\Abi\Contract;
use TON\Abi\None;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\Signer;
use TON\Boc\ParamsOfParse;
use TON\Net\ParamsOfWaitForCollection;
use TON\Processing\ParamsOfProcessMessage;
use TON\Processing\ResultOfProcessMessage;

class TestClient extends TonClient
{
    public const DEFAULT_ABI_VERSION = 2;

    public const GIVER_ADDRESS = "0:841288ed3b55d9cdafa806807f02a0ae0c169aa5edfe88a789a6482429756a94";

    public function deployWithGiver(ParamsOfEncodeMessage $params, ?int $value = null): string
    {
        $msg = $this->abi()->encodeMessage($params);
        $this->getGramsFromGiver($msg->getAddress(), $value);
        $this->processing()->processMessage((new ParamsOfProcessMessage())
            ->setMessageEncodeParams($params)
            ->setSendEvents(false));
        return $msg->getAddress();
    }

    public function getGramsFromGiver(string $account, ?int $value = null): void
    {
        $run_result = $this->netProcessFunction(
            self::GIVER_ADDRESS,
            self::giver_abi(),
            "sendGrams",
            [
                "dest" => $account,
                "amount" => $value ?? 500000000
            ],
            new None());

        foreach ($run_result->getOutMessages() as $message) {
            $parsed = $this->boc()->parseMessage((new ParamsOfParse())
                ->setBoc($message));

            $message = $parsed->getParsed();

            if ('Internal' === $message['msg_type']) {
                $this->net()->waitForCollection((new ParamsOfWaitForCollection())
                    ->setCollection("transactions")
                    ->setFilter([
                        "in_msg" => ["eq" => $message["id"]]
                    ])
                    ->setResult("id"));
            }
        }
    }

    public function netProcessFunction(
        string $address,
        Abi $abi,
        string $function_name,
        array $input,
        Signer $signer): ResultOfProcessMessage
    {
        return $this->processing()->processMessage(
            (new ParamsOfProcessMessage())
                ->setMessageEncodeParams((new ParamsOfEncodeMessage())
                    ->setAddress($address)
                    ->setAbi($abi)
                    ->setCallSet((new CallSet())
                        ->setFunctionName($function_name)
                        ->setInput($input))
                    ->setSigner($signer))
                ->setSendEvents(false));
    }

    public function fetchAccount(string $address): array
    {
        return $this->net()->waitForCollection(
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
        return (new Contract())->setValue($abi);
    }
}
