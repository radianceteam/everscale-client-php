<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use TON\Utils\Async\UtilsModuleAsyncInterface;

/**
 * Misc utility Functions.
 */
interface UtilsModuleInterface
{
    /**
     * @return UtilsModuleAsyncInterface Async version of utils module interface.
     */
    function async(): UtilsModuleAsyncInterface;

    /**
     * Converts address from any TON format to any TON format
     */
    function convertAddress(ParamsOfConvertAddress $params): ResultOfConvertAddress;
}
