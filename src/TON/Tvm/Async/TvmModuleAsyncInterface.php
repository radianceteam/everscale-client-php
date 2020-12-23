<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm\Async;

use TON\Tvm\ParamsOfRunExecutor;
use TON\Tvm\ParamsOfRunGet;
use TON\Tvm\ParamsOfRunTvm;

interface TvmModuleAsyncInterface
{
    /**
     * @param ParamsOfRunExecutor $params
     * @return AsyncResultOfRunExecutor
     */
    function runExecutorAsync(ParamsOfRunExecutor $params): AsyncResultOfRunExecutor;

    /**
     * @param ParamsOfRunTvm $params
     * @return AsyncResultOfRunTvm
     */
    function runTvmAsync(ParamsOfRunTvm $params): AsyncResultOfRunTvm;

    /**
     * @param ParamsOfRunGet $params
     * @return AsyncResultOfRunGet
     */
    function runGetAsync(ParamsOfRunGet $params): AsyncResultOfRunGet;
}
