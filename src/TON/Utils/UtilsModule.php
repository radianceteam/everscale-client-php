<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use TON\TonContext;
use TON\Utils\Async\AsyncUtilsModule;
use TON\Utils\Async\UtilsModuleAsyncInterface;

class UtilsModule implements UtilsModuleInterface
{
    private TonContext $_context;

    /**
     * UtilsModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return UtilsModuleAsyncInterface Async version of utils module interface.
     */
    public function async(): UtilsModuleAsyncInterface
    {
        return new AsyncUtilsModule($this->_context);
    }

    /**
     * @param ParamsOfConvertAddress $params
     * @return ResultOfConvertAddress
     */
    public function convertAddress(ParamsOfConvertAddress $params): ResultOfConvertAddress
    {
        return new ResultOfConvertAddress($this->_context->callFunction('utils.convert_address', $params));
    }

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
     * @return ResultOfGetAddressType
     */
    public function getAddressType(ParamsOfGetAddressType $params): ResultOfGetAddressType
    {
        return new ResultOfGetAddressType($this->_context->callFunction('utils.get_address_type', $params));
    }

    /**
     * @param ParamsOfCalcStorageFee $params
     * @return ResultOfCalcStorageFee
     */
    public function calcStorageFee(ParamsOfCalcStorageFee $params): ResultOfCalcStorageFee
    {
        return new ResultOfCalcStorageFee($this->_context->callFunction('utils.calc_storage_fee', $params));
    }

    /**
     * @param ParamsOfCompressZstd $params
     * @return ResultOfCompressZstd
     */
    public function compressZstd(ParamsOfCompressZstd $params): ResultOfCompressZstd
    {
        return new ResultOfCompressZstd($this->_context->callFunction('utils.compress_zstd', $params));
    }

    /**
     * @param ParamsOfDecompressZstd $params
     * @return ResultOfDecompressZstd
     */
    public function decompressZstd(ParamsOfDecompressZstd $params): ResultOfDecompressZstd
    {
        return new ResultOfDecompressZstd($this->_context->callFunction('utils.decompress_zstd', $params));
    }
}
