<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use TON\Processing\Async\ProcessingModuleAsyncInterface;

/**
 * Message processing module.
 *
 *  This module incorporates functions related to complex message
 *  processing scenarios.
 */
interface ProcessingModuleInterface
{
    /**
     * @return ProcessingModuleAsyncInterface Async version of processing module interface.
     */
    function async(): ProcessingModuleAsyncInterface;
}
