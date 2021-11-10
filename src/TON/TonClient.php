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
use TON\Debot\DebotModule;
use TON\Debot\DebotModuleInterface;
use TON\Net\NetModule;
use TON\Net\NetModuleInterface;
use TON\Processing\ProcessingModule;
use TON\Processing\ProcessingModuleInterface;
use TON\Proofs\ProofsModule;
use TON\Proofs\ProofsModuleInterface;
use TON\TonContext;
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
    private DebotModuleInterface $_debot;
    private ProofsModuleInterface $_proofs;

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
        $this->_debot = new DebotModule($this->_context);
        $this->_proofs = new ProofsModule($this->_context);
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->_context->setLogger($logger);
    }

    public function client(): ClientModuleInterface
    {
        return $this->_client;
    }

    public function crypto(): CryptoModuleInterface
    {
        return $this->_crypto;
    }

    public function abi(): AbiModuleInterface
    {
        return $this->_abi;
    }

    public function boc(): BocModuleInterface
    {
        return $this->_boc;
    }

    /**
     * This module incorporates functions related to complex message
     * processing scenarios.
     */
    public function processing(): ProcessingModuleInterface
    {
        return $this->_processing;
    }

    public function utils(): UtilsModuleInterface
    {
        return $this->_utils;
    }

    public function tvm(): TvmModuleInterface
    {
        return $this->_tvm;
    }

    public function net(): NetModuleInterface
    {
        return $this->_net;
    }

    public function debot(): DebotModuleInterface
    {
        return $this->_debot;
    }

    public function proofs(): ProofsModuleInterface
    {
        return $this->_proofs;
    }
}
