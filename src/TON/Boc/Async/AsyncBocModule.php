<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc\Async;

use TON\Boc\ParamsOfGetBlockchainConfig;
use TON\Boc\ParamsOfGetBocHash;
use TON\Boc\ParamsOfParse;
use TON\Boc\ParamsOfParseShardstate;
use TON\TonContext;

/**
 * BOC manipulation module.
 */
class AsyncBocModule implements BocModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncBocModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Parses message boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API message object
     */
    public function parseMessageAsync(ParamsOfParse $params): AsyncResultOfParse
    {
        return new AsyncResultOfParse($this->_context->callFunctionAsync('boc.parse_message', $params));
    }

    /**
     * Parses transaction boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API transaction object
     */
    public function parseTransactionAsync(ParamsOfParse $params): AsyncResultOfParse
    {
        return new AsyncResultOfParse($this->_context->callFunctionAsync('boc.parse_transaction', $params));
    }

    /**
     * Parses account boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API account object
     */
    public function parseAccountAsync(ParamsOfParse $params): AsyncResultOfParse
    {
        return new AsyncResultOfParse($this->_context->callFunctionAsync('boc.parse_account', $params));
    }

    /**
     * Parses block boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API block object
     */
    public function parseBlockAsync(ParamsOfParse $params): AsyncResultOfParse
    {
        return new AsyncResultOfParse($this->_context->callFunctionAsync('boc.parse_block', $params));
    }

    /**
     * Parses shardstate boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API shardstate object
     */
    public function parseShardstateAsync(ParamsOfParseShardstate $params): AsyncResultOfParse
    {
        return new AsyncResultOfParse($this->_context->callFunctionAsync('boc.parse_shardstate', $params));
    }

    public function getBlockchainConfigAsync(ParamsOfGetBlockchainConfig $params): AsyncResultOfGetBlockchainConfig
    {
        return new AsyncResultOfGetBlockchainConfig($this->_context->callFunctionAsync('boc.get_blockchain_config', $params));
    }

    /**
     * Calculates BOC root hash
     */
    public function getBocHashAsync(ParamsOfGetBocHash $params): AsyncResultOfGetBocHash
    {
        return new AsyncResultOfGetBocHash($this->_context->callFunctionAsync('boc.get_boc_hash', $params));
    }
}
