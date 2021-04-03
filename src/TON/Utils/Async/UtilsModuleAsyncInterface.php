<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils\Async;

use TON\Utils\ParamsOfCalcStorageFee;
use TON\Utils\ParamsOfCompressZstd;
use TON\Utils\ParamsOfConvertAddress;
use TON\Utils\ParamsOfDecompressZstd;

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

    /**
     * @param ParamsOfCompressZstd $params
     * @return AsyncResultOfCompressZstd
     */
    function compressZstdAsync(ParamsOfCompressZstd $params): AsyncResultOfCompressZstd;

    /**
     * @param ParamsOfDecompressZstd $params
     * @return AsyncResultOfDecompressZstd
     */
    function decompressZstdAsync(ParamsOfDecompressZstd $params): AsyncResultOfDecompressZstd;
}
