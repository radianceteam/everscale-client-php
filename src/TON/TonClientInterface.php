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
use TON\Proofs\ProofsModuleInterface;
use TON\TonContext;
use TON\Tvm\TvmModuleInterface;
use TON\Utils\UtilsModuleInterface;

interface TonClientInterface
{
    function client(): ClientModuleInterface;

    function crypto(): CryptoModuleInterface;

    function abi(): AbiModuleInterface;

    function boc(): BocModuleInterface;

    /**
     * This module incorporates functions related to complex message
     * processing scenarios.
     */
    function processing(): ProcessingModuleInterface;

    function utils(): UtilsModuleInterface;

    function tvm(): TvmModuleInterface;

    function net(): NetModuleInterface;

    function debot(): DebotModuleInterface;

    function proofs(): ProofsModuleInterface;
}
