<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm\Async;

use TON\TonContext;
use TON\Tvm\ParamsOfRunExecutor;
use TON\Tvm\ParamsOfRunGet;
use TON\Tvm\ParamsOfRunTvm;

class AsyncTvmModule implements TvmModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncTvmModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @param ParamsOfRunExecutor $params
     * @return AsyncResultOfRunExecutor
     */
    public function runExecutorAsync(ParamsOfRunExecutor $params): AsyncResultOfRunExecutor
    {
        return new AsyncResultOfRunExecutor($this->_context->callFunctionAsync('tvm.run_executor', $params));
    }

    /**
     * @param ParamsOfRunTvm $params
     * @return AsyncResultOfRunTvm
     */
    public function runTvmAsync(ParamsOfRunTvm $params): AsyncResultOfRunTvm
    {
        return new AsyncResultOfRunTvm($this->_context->callFunctionAsync('tvm.run_tvm', $params));
    }

    /**
     * Executes getmethod and returns data from TVM stack
     * @param ParamsOfRunGet $params
     * @return AsyncResultOfRunGet
     */
    public function runGetAsync(ParamsOfRunGet $params): AsyncResultOfRunGet
    {
        return new AsyncResultOfRunGet($this->_context->callFunctionAsync('tvm.run_get', $params));
    }
}
