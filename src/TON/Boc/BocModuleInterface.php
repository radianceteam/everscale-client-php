<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use TON\Boc\Async\BocModuleAsyncInterface;

/**
 * BOC manipulation module.
 */
interface BocModuleInterface
{
    /**
     * @return BocModuleAsyncInterface Async version of boc module interface.
     */
    function async(): BocModuleAsyncInterface;

    /**
     * Parses message boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API message object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseMessage(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses transaction boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API transaction object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseTransaction(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses account boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API account object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseAccount(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses block boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API block object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseBlock(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses shardstate boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API shardstate object
     * @param ParamsOfParseShardstate $params
     * @return ResultOfParse
     */
    function parseShardstate(ParamsOfParseShardstate $params): ResultOfParse;

    /**
     * @param ParamsOfGetBlockchainConfig $params
     * @return ResultOfGetBlockchainConfig
     */
    function getBlockchainConfig(ParamsOfGetBlockchainConfig $params): ResultOfGetBlockchainConfig;

    /**
     * Calculates BOC root hash
     * @param ParamsOfGetBocHash $params
     * @return ResultOfGetBocHash
     */
    function getBocHash(ParamsOfGetBocHash $params): ResultOfGetBocHash;
}
