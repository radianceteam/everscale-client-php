<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use TON\TonContext;

/**
 * BOC manipulation module.
 */
class BocModule
{
    private TonContext $_context;

    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Parses message boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API message object
     */
    public function parseMessage(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_message', $params));
    }

    /**
     * Parses transaction boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API transaction object
     */
    public function parseTransaction(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_transaction', $params));
    }

    /**
     * Parses account boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API account object
     */
    public function parseAccount(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_account', $params));
    }

    /**
     * Parses block boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API block object
     */
    public function parseBlock(ParamsOfParse $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_block', $params));
    }

    /**
     * Parses shardstate boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API shardstate object
     */
    public function parseShardstate(ParamsOfParseShardstate $params): ResultOfParse
    {
        return new ResultOfParse($this->_context->callFunction('boc.parse_shardstate', $params));
    }

    public function getBlockchainConfig(ParamsOfGetBlockchainConfig $params): ResultOfGetBlockchainConfig
    {
        return new ResultOfGetBlockchainConfig($this->_context->callFunction('boc.get_blockchain_config', $params));
    }

    /**
     * Calculates BOC root hash
     */
    public function getBocHash(ParamsOfGetBocHash $params): ResultOfGetBocHash
    {
        return new ResultOfGetBocHash($this->_context->callFunction('boc.get_boc_hash', $params));
    }
}
