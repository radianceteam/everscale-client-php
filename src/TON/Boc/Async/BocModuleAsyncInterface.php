<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc\Async;

use TON\Boc\ParamsOfGetBlockchainConfig;
use TON\Boc\ParamsOfGetBocHash;
use TON\Boc\ParamsOfGetCodeFromTvc;
use TON\Boc\ParamsOfParse;
use TON\Boc\ParamsOfParseShardstate;

interface BocModuleAsyncInterface
{
    /**
     * JSON structure is compatible with GraphQL API message object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseMessageAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API transaction object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseTransactionAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API account object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseAccountAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API block object
     * @param ParamsOfParse $params
     * @return AsyncResultOfParse
     */
    function parseBlockAsync(ParamsOfParse $params): AsyncResultOfParse;

    /**
     * JSON structure is compatible with GraphQL API shardstate object
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
     * @param ParamsOfGetBocHash $params
     * @return AsyncResultOfGetBocHash
     */
    function getBocHashAsync(ParamsOfGetBocHash $params): AsyncResultOfGetBocHash;

    /**
     * @param ParamsOfGetCodeFromTvc $params
     * @return AsyncResultOfGetCodeFromTvc
     */
    function getCodeFromTvcAsync(ParamsOfGetCodeFromTvc $params): AsyncResultOfGetCodeFromTvc;
}
