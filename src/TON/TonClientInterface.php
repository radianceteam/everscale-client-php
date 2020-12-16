<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON;

use TON\Abi\AbiModuleInterface;
use TON\Boc\BocModuleInterface;
use TON\Client\ClientModuleInterface;
use TON\Crypto\CryptoModuleInterface;
use TON\Debot\DebotModuleInterface;
use TON\Net\NetModuleInterface;
use TON\Processing\ProcessingModuleInterface;
use TON\Tvm\TvmModuleInterface;
use TON\Utils\UtilsModuleInterface;

interface TonClientInterface
{
    /**
     * Provides information about library.
     */
    function client(): ClientModuleInterface;

    /**
     * Crypto functions.
     */
    function crypto(): CryptoModuleInterface;

    /**
     * Provides message encoding and decoding according to the ABI
     *  specification.
     */
    function abi(): AbiModuleInterface;

    /**
     * BOC manipulation module.
     */
    function boc(): BocModuleInterface;

    /**
     * Message processing module.
     *
     *  This module incorporates functions related to complex message
     *  processing scenarios.
     */
    function processing(): ProcessingModuleInterface;

    /**
     * Misc utility Functions.
     */
    function utils(): UtilsModuleInterface;

    function tvm(): TvmModuleInterface;

    /**
     * Network access.
     */
    function net(): NetModuleInterface;

    /**
     * [UNSTABLE](UNSTABLE.md) Module for working with debot.
     */
    function debot(): DebotModuleInterface;
}
