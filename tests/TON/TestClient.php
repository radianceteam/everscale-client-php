<?php

namespace TON;

use RuntimeException;
use TON\Abi\AbiContract;

class TestClient
{
    public const DEFAULT_ABI_VERSION = 2;

    public static function abi(string $name, int $version = self::DEFAULT_ABI_VERSION): AbiContract
    {
        return new AbiContract(json_decode(self::read_file("tests/contracts/abi_v${version}/${name}.abi.json"), true));
    }

    public static function tvc(string $name, int $version = self::DEFAULT_ABI_VERSION): string
    {
        return base64_encode(self::read_file(
            "tests/contracts/abi_v${version}/${name}.tvc"));
    }

    public static function package(string $name, int $version = self::DEFAULT_ABI_VERSION): array
    {
        return [
            self::abi($name, $version),
            self::tvc($name, $version)
        ];
    }

    private static function read_file(string $file_name): string
    {
        $contents = file_get_contents($file_name);
        if (!$contents) {
            throw new RuntimeException("File not found: ${file_name}");
        }
        return $contents;
    }
}
