<?php

namespace TON\Debot;

use InvalidArgumentException;

class DebotEcho
{
    public static function getEcho(int $answerId, string $request): array
    {
        return [$answerId, json_encode([
            'response' => bin2hex($request)
        ])];
    }

    public static function call(string $func, array $args): array
    {
        switch ($func) {
            case 'echo':
                $answerId = $args['answerId'];
                $requestVec = hex2bin($args['request']);
                $request = utf8_decode($requestVec);
                return self::getEcho($answerId, $request);

            default:
                throw new InvalidArgumentException("Unsupported func $func");
        }
    }
}