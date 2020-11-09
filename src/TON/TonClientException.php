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
}
