<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use TON\Boc\Async\AsyncBocModule;
use TON\Boc\Async\BocModuleAsyncInterface;
use TON\TonContext;

class BocModule implements BocModuleInterface
{
    private TonContext $_context;

    /**
     * BocModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return BocModuleAsyncInterface Async version of boc module interface.
     */
    public function async(): BocModuleAsyncInterface
    {
        return new AsyncBocModule($this->_context);
    }

    /**
     * JSON structure is compatible with GraphQL API message object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    public function parseMessage(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_message', $params));
    }

    /**
     * JSON structure is compatible with GraphQL API transaction object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    public function parseTransaction(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_transaction', $params));
    }

    /**
     * JSON structure is compatible with GraphQL API account object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    public function parseAccount(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_account', $params));
    }

    /**
     * JSON structure is compatible with GraphQL API block object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    public function parseBlock(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_block', $params));
    }

    /**
     * JSON structure is compatible with GraphQL API shardstate object
     * @param ParamsOfParseShardstate $params
     * @return ResultOfParse
     */
    public function parseShardstate(ParamsOfParseShardstate $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_shardstate', $params));
    }

    /**
     * @param ParamsOfGetBlockchainConfig $params
     * @return ResultOfGetBlockchainConfig
     */
    public function getBlockchainConfig(ParamsOfGetBlockchainConfig $params): ResultOfGetBlockchainConfig
    {
        return new ResultOfGetBlockchainConfig($this->_context->callFunction('boc.get_blockchain_config', $params));
    }

    /**
     * @param ParamsOfGetBocHash $params
     * @return ResultOfGetBocHash
     */
    public function getBocHash(ParamsOfGetBocHash $params): ResultOfGetBocHash
    {
        return new ResultOfGetBocHash($this->_context->callFunction('boc.get_boc_hash', $params));
    }
}
