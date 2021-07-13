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
use TON\Utils\ParamsOfGetAddressType;

interface UtilsModuleAsyncInterface
{
    /**
     * @param ParamsOfConvertAddress $params
     * @return AsyncResultOfConvertAddress
     */
    function convertAddressAsync(ParamsOfConvertAddress $params): AsyncResultOfConvertAddress;

    /**
     * Address types are the following
     *
     * `0:919db8e740d50bf349df2eea03fa30c385d846b991ff5542e67098ee833fc7f7` - standart TON address most
     * commonly used in all cases. Also called as hex addres
     * `919db8e740d50bf349df2eea03fa30c385d846b991ff5542e67098ee833fc7f7` - account ID. A part of full
     * address. Identifies account inside particular workchain
     * `EQCRnbjnQNUL80nfLuoD+jDDhdhGuZH/VULmcJjugz/H9wam` - base64 address. Also called "user-friendly".
     * Was used at the beginning of TON. Now it is supported for compatibility
     * @param ParamsOfGetAddressType $params
     * @return AsyncResultOfGetAddressType
     */
    function getAddressTypeAsync(ParamsOfGetAddressType $params): AsyncResultOfGetAddressType;

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
