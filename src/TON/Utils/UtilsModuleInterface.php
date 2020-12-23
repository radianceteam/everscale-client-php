<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use TON\Utils\Async\UtilsModuleAsyncInterface;

interface UtilsModuleInterface
{
    /**
     * @return UtilsModuleAsyncInterface Async version of utils module interface.
     */
    function async(): UtilsModuleAsyncInterface;

    /**
     * @param ParamsOfConvertAddress $params
     * @return ResultOfConvertAddress
     */
    function convertAddress(ParamsOfConvertAddress $params): ResultOfConvertAddress;
}
