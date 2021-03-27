<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils\Async;

use TON\TonContext;
use TON\Utils\ParamsOfCalcStorageFee;
use TON\Utils\ParamsOfConvertAddress;

class AsyncUtilsModule implements UtilsModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncUtilsModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @param ParamsOfConvertAddress $params
     * @return AsyncResultOfConvertAddress
     */
    public function convertAddressAsync(ParamsOfConvertAddress $params): AsyncResultOfConvertAddress
    {
        return new AsyncResultOfConvertAddress($this->_context->callFunctionAsync('utils.convert_address', $params));
    }

    /**
     * @param ParamsOfCalcStorageFee $params
     * @return AsyncResultOfCalcStorageFee
     */
    public function calcStorageFeeAsync(ParamsOfCalcStorageFee $params): AsyncResultOfCalcStorageFee
    {
        return new AsyncResultOfCalcStorageFee($this->_context->callFunctionAsync('utils.calc_storage_fee', $params));
    }
}
