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

/**
 * BOC manipulation module.
 */
interface BocModuleAsyncInterface
{
    /**
     * Parses message boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API message object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseMessageAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * Parses transaction boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API transaction object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseTransactionAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * Parses account boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API account object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseAccountAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * Parses block boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API block object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseBlockAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * Parses shardstate boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API shardstate object
     * @param ParamsOfParseShardstate $params
     * @return AsyncResultOfParse
     */
    function parseShardstateAsync(ParamsOfParseShardstate $params): AsyncResultOfParse;

    /**
     * @param ParamsOfGetBlockchainConfig $params
     * @return AsyncResultOfGetBlockchainConfig
     */
    function getBlockchainConfigAsync(ParamsOfGetBlockchainConfig $params): AsyncResultOfGetBlockchainConfig;

    /**
     * Calculates BOC root hash
     * @param ParamsOfGetBocHash $params
     * @return AsyncResultOfGetBocHash
     */
    function getBocHashAsync(ParamsOfGetBocHash $params): AsyncResultOfGetBocHash;
}
