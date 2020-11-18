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
    function runExecutorAsync(ParamsOfRunExecutor $params): AsyncResultOfRunExecutor;

    function runTvmAsync(ParamsOfRunTvm $params): AsyncResultOfRunTvm;

    /**
     * Executes getmethod and returns data from TVM stack
     */
    function runGetAsync(ParamsOfRunGet $params): AsyncResultOfRunGet;
}
