<?php declare(strict_types=1);

namespace TON\Debot;

class DebotStep
{
    public int $choice;

    /**
     * @var string[]
     */
    public array $inputs = [];

    /**
     * @var string[]
     */
    public array $outputs = [];

    /**
     * @var DebotStep[][]
     */
    public array $invokes = [];

    /**
     * DebotStep constructor.
     * @param int $choice
     * @param string[] $inputs
     * @param string[] $outputs
     * @param DebotStep[][] $invokes
     */
    public function __construct(int $choice, array $inputs, array $outputs, array $invokes = [])
    {
        $this->choice = $choice;
        $this->inputs = $inputs;
        $this->outputs = $outputs;
        $this->invokes = $invokes;
    }
}