<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm;

interface TvmModuleInterface
{
    function runExecutor(ParamsOfRunExecutor $params): ResultOfRunExecutor;

    function runTvm(ParamsOfRunTvm $params): ResultOfRunTvm;

    /**
     * Executes getmethod and returns data from TVM stack
     */
    function runGet(ParamsOfRunGet $params): ResultOfRunGet;
}
