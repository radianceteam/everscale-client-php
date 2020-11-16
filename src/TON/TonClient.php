<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON;

use JsonSerializable;
use Psr\Log\LoggerInterface;
use TON\Abi\AbiModule;
use TON\Abi\AbiModuleInterface;
use TON\Boc\BocModule;
use TON\Boc\BocModuleInterface;
use TON\Client\ClientModule;
use TON\Client\ClientModuleInterface;
use TON\Crypto\CryptoModule;
use TON\Crypto\CryptoModuleInterface;
use TON\Net\NetModule;
use TON\Net\NetModuleInterface;
use TON\Processing\ProcessingModule;
use TON\Processing\ProcessingModuleInterface;
use TON\Tvm\TvmModule;
use TON\Tvm\TvmModuleInterface;
use TON\Utils\UtilsModule;
use TON\Utils\UtilsModuleInterface;

class TonClient implements TonClientInterface
{
    private TonContext $_context;
    private ClientModuleInterface $_client;
    private CryptoModuleInterface $_crypto;
    private AbiModuleInterface $_abi;
    private BocModuleInterface $_boc;
    private ProcessingModuleInterface $_processing;
    private UtilsModuleInterface $_utils;
    private TvmModuleInterface $_tvm;
    private NetModuleInterface $_net;

    public function __construct(?JsonSerializable $config = null, ?LoggerInterface $logger = null)
    {
        $this->_context = new TonContext($config, $logger);
        $this->_client = new ClientModule($this->_context);
        $this->_crypto = new CryptoModule($this->_context);
        $this->_abi = new AbiModule($this->_context);
        $this->_boc = new BocModule($this->_context);
        $this->_processing = new ProcessingModule($this->_context);
        $this->_utils = new UtilsModule($this->_context);
        $this->_tvm = new TvmModule($this->_context);
        $this->_net = new NetModule($this->_context);
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->_context->setLogger($logger);
    }

    /**
     * Provides information about library.
     */
    public function client(): ClientModuleInterface
    {
        return $this->_client;
    }

    /**
     * Crypto functions.
     */
    public function crypto(): CryptoModuleInterface
    {
        return $this->_crypto;
    }

    /**
     * Provides message encoding and decoding according to the ABI
     *  specification.
     */
    public function abi(): AbiModuleInterface
    {
        return $this->_abi;
    }

    /**
     * BOC manipulation module.
     */
    public function boc(): BocModuleInterface
    {
        return $this->_boc;
    }

    /**
     * Message processing module.
     *
     *  This module incorporates functions related to complex message
     *  processing scenarios.
     */
    public function processing(): ProcessingModuleInterface
    {
        return $this->_processing;
    }

    /**
     * Misc utility Functions.
     */
    public function utils(): UtilsModuleInterface
    {
        return $this->_utils;
    }

    public function tvm(): TvmModuleInterface
    {
        return $this->_tvm;
    }

    /**
     * Network access.
     */
    public function net(): NetModuleInterface
    {
        return $this->_net;
    }
}
