<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

/**
 * Misc utility Functions.
 */
interface UtilsModuleInterface
{
    /**
     * Converts address from any TON format to any TON format
     */
    function convertAddress(ParamsOfConvertAddress $params): ResultOfConvertAddress;
}
