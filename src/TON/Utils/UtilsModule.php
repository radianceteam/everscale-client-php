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
}
