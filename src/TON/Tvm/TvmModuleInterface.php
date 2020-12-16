<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

use TON\Tvm\Async\TvmModuleAsyncInterface;

interface TvmModuleInterface
{
    /**
     * @return TvmModuleAsyncInterface Async version of tvm module interface.
     */
    function async(): TvmModuleAsyncInterface;

    /**
     * @param ParamsOfRunExecutor $params
     * @return ResultOfRunExecutor
     */
    function runExecutor(ParamsOfRunExecutor $params): ResultOfRunExecutor;

    /**
     * @param ParamsOfRunTvm $params
     * @return ResultOfRunTvm
     */
    function runTvm(ParamsOfRunTvm $params): ResultOfRunTvm;

    /**
     * Executes getmethod and returns data from TVM stack
     * @param ParamsOfRunGet $params
     * @return ResultOfRunGet
     */
    function runGet(ParamsOfRunGet $params): ResultOfRunGet;
}
