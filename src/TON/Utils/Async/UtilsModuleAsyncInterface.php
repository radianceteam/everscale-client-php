<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils\Async;

use TON\Utils\ParamsOfConvertAddress;

/**
 * Misc utility Functions.
 */
interface UtilsModuleAsyncInterface
{
    /**
     * Converts address from any TON format to any TON format
     * @param ParamsOfConvertAddress $params
     * @return AsyncResultOfConvertAddress
     */
    function convertAddressAsync(ParamsOfConvertAddress $params): AsyncResultOfConvertAddress;
}
