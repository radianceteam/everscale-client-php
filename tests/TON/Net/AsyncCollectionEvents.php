<?php

namespace TON\Net;

use TON\Net\Async\AsyncResultOfSubscribeCollection;

class AsyncCollectionEvents
{
    /**
     * @var array
     */
    public array $transactions = [];

    /**
     * @var array
     */
    public array $notifications = [];

    /**
     * @return int
     */
    public function getTransactionCount(): int
    {
        return count($this->transactions);
    }

    /**
     * @return int
     */
    public function getNotificationCount(): int
    {
        return count($this->notifications);
    }

    /**
     * @return string[]
     */
    public function getTransactionIds(): array
    {
        return array_map(function (array $t) {
            return $t['result']['id'];
        }, $this->transactions);
    }

    /**
     * @return int[]
     */
    public function getNotificationCodes(): array
    {
        return array_map(function (array $n) {
            return $n['code'];
        }, $this->notifications);
    }

    public static function read(AsyncResultOfSubscribeCollection $subscribePromise): AsyncCollectionEvents
    {
        $events = new AsyncCollectionEvents();
        foreach ($subscribePromise->getEvents(0) as $event) {
            if (isset($event['result']['id'])) {
                $events->transactions[] = $event;
            } else {
                $events->notifications[] = $event;
            }
        }
        return $events;
    }
}
