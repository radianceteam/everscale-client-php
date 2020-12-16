<?php declare(strict_types=1);

namespace TON\Debot;

use TON\Crypto\KeyPair;

class BrowserData
{
    public CurrentStepData $current;

    /**
     * @var DebotStep[]
     */
    public array $next;

    public KeyPair $keys;

    public string $address;

    public bool $finished;
}
