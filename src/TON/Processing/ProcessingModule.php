<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use TON\Processing\Async\AsyncProcessingModule;
use TON\Processing\Async\ProcessingModuleAsyncInterface;
use TON\TonContext;

/**
 * This module incorporates functions related to complex message
 * processing scenarios.
 */
class ProcessingModule implements ProcessingModuleInterface
{
    private TonContext $_context;

    /**
     * ProcessingModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return ProcessingModuleAsyncInterface Async version of processing module interface.
     */
    public function async(): ProcessingModuleAsyncInterface
    {
        return new AsyncProcessingModule($this->_context);
    }
}
