<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Debot;

use JsonSerializable;
use stdClass;

class ParamsOfAppDebotBrowser_Input extends ParamsOfAppDebotBrowser implements JsonSerializable
{
    /** A prompt string that must be printed to user before input request. */
    private string $_prompt;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_prompt = $dto['prompt'] ?? '';
    }

    /**
     * A prompt string that must be printed to user before input request.
     */
    public function getPrompt(): string
    {
        return $this->_prompt;
    }

    /**
     * A prompt string that must be printed to user before input request.
     */
    public function setPrompt(string $prompt): self
    {
        $this->_prompt = $prompt;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Input'];
        if ($this->_prompt !== null) $result['prompt'] = $this->_prompt;
        return !empty($result) ? $result : new stdClass();
    }
}
