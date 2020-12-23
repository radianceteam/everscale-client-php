<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

use TON\Boc\Async\BocModuleAsyncInterface;

interface BocModuleInterface
{
    /**
     * @return BocModuleAsyncInterface Async version of boc module interface.
     */
    function async(): BocModuleAsyncInterface;

    /**
     * JSON structure is compatible with GraphQL API message object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseMessage(ParamsOfParse $params): ResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API transaction object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseTransaction(ParamsOfParse $params): ResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API account object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseAccount(ParamsOfParse $params): ResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API block object
     * @param ParamsOfParse $params
     * @return ResultOfParse
     */
    function parseBlock(ParamsOfParse $params): ResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API shardstate object
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
     * @param ParamsOfGetBocHash $params
     * @return ResultOfGetBocHash
     */
    function getBocHash(ParamsOfGetBocHash $params): ResultOfGetBocHash;
}
