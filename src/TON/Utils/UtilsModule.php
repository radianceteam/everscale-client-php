<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use TON\TonContext;

/**
 * Misc utility Functions.
 */
class UtilsModule
{
    private TonContext $_context;

    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Converts address from any TON format to any TON format
     */
    public function convertAddress(ParamsOfConvertAddress $params): ResultOfConvertAddress
    {
        return new ResultOfConvertAddress($this->_context->callFunction('utils.convert_address', $params));
    }
}
