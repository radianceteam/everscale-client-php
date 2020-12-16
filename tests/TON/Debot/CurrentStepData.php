<?php declare(strict_types=1);

namespace TON\Debot;

class CurrentStepData
{
    /**
     * @var DebotAction[]
     */
    public array $available_actions = [];

    /**
     * @var string[]
     */
    public array $outputs = [];

    public DebotStep $step;
}