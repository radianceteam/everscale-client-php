<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use TON\TonContext;
use TON\Tvm\Async\AsyncTvmModule;
use TON\Tvm\Async\TvmModuleAsyncInterface;

class TvmModule implements TvmModuleInterface
{
    private TonContext $_context;

    /**
     * TvmModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return TvmModuleAsyncInterface Async version of tvm module interface.
     */
    public function async(): TvmModuleAsyncInterface
    {
        return new AsyncTvmModule($this->_context);
    }

    /**
     * @param ParamsOfRunExecutor $params
     * @return ResultOfRunExecutor
     */
    public function runExecutor(ParamsOfRunExecutor $params): ResultOfRunExecutor
    {
        return new ResultOfRunExecutor($this->_context->callFunction('tvm.run_executor', $params));
    }

    /**
     * @param ParamsOfRunTvm $params
     * @return ResultOfRunTvm
     */
    public function runTvm(ParamsOfRunTvm $params): ResultOfRunTvm
    {
        return new ResultOfRunTvm($this->_context->callFunction('tvm.run_tvm', $params));
    }

    /**
     * Executes getmethod and returns data from TVM stack
     * @param ParamsOfRunGet $params
     * @return ResultOfRunGet
     */
    public function runGet(ParamsOfRunGet $params): ResultOfRunGet
    {
        return new ResultOfRunGet($this->_context->callFunction('tvm.run_get', $params));
    }
}
