<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use JsonSerializable;
use stdClass;

class CallSet implements JsonSerializable
{
    /** Function name that is being called. */
    private string $_functionName;

    /**
     * Function header.
     *
     *  If an application omits some header parameters required by the
     *  contract's ABI, the library will set the default values for
     *  them.
     */
    private ?FunctionHeader $_header;

    /** Function input parameters according to ABI. */
    private $_input;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_functionName = $dto['function_name'] ?? '';
        $this->_header = isset($dto['header']) ? new FunctionHeader($dto['header']) : null;
        $this->_input = $dto['input'] ?? null;
    }

    /**
     * Function name that is being called.
     */
    public function getFunctionName(): string
    {
        return $this->_functionName;
    }

    /**
     * Function header.
     *
     *  If an application omits some header parameters required by the
     *  contract's ABI, the library will set the default values for
     *  them.
     */
    public function getHeader(): ?FunctionHeader
    {
        return $this->_header;
    }

    /**
     * Function input parameters according to ABI.
     */
    public function getInput()
    {
        return $this->_input;
    }

    /**
     * Function name that is being called.
     */
    public function setFunctionName(string $functionName): self
    {
        $this->_functionName = $functionName;
        return $this;
    }

    /**
     * Function header.
     *
     *  If an application omits some header parameters required by the
     *  contract's ABI, the library will set the default values for
     *  them.
     */
    public function setHeader(?FunctionHeader $header): self
    {
        $this->_header = $header;
        return $this;
    }

    /**
     * Function input parameters according to ABI.
     */
    public function setInput($input): self
    {
        $this->_input = $input;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_functionName !== null) $result['function_name'] = $this->_functionName;
        if ($this->_header !== null) $result['header'] = $this->_header;
        if ($this->_input !== null) $result['input'] = $this->_input;
        return !empty($result) ? $result : new stdClass();
    }
}
