<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils\Async;

use TON\Utils\ParamsOfCalcStorageFee;
use TON\Utils\ParamsOfConvertAddress;

interface UtilsModuleAsyncInterface
{
    /**
     * @param ParamsOfConvertAddress $params
     * @return AsyncResultOfConvertAddress
     */
    function convertAddressAsync(ParamsOfConvertAddress $params): AsyncResultOfConvertAddress;

    /**
     * @param ParamsOfCalcStorageFee $params
     * @return AsyncResultOfCalcStorageFee
     */
    function calcStorageFeeAsync(ParamsOfCalcStorageFee $params): AsyncResultOfCalcStorageFee;
}
