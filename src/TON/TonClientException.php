<?php

namespace TON;

use RuntimeException;
use Throwable;

class TonClientException extends RuntimeException
{
    public function __construct(string $message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function fromJson(string $json): self
    {
        $response = json_decode($json, true);
        if (!$response || !isset($response['error'])) {
            return new TonClientException("The returned JSON is invalid: ${json}");
        }
        return self::fromErrorDto($response['error']);
    }

    public static function fromErrorDto(array $error): self
    {
        if (!isset($error['message'])) {
            $json = json_encode($error);
            return new TonClientException("Error returned: ${json}");
        }
        return new TonClientException(
            $error['message'] ?? '',
            $error['code'] ?? 0);
    }
}
