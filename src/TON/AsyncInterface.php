<?php

namespace TON;

interface AsyncInterface
{
    function join(JoinableInterface $joinable, int $disconnect = JoinableInterface::DISCONNECT_AFTER_AWAIT): self;

    public function disconnect(JoinableInterface $joinable): self;
}