<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc;

/**
 * BOC manipulation module.
 */
interface BocModuleInterface
{
    /**
     * Parses message boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API message object
     */
    function parseMessage(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses transaction boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API transaction object
     */
    function parseTransaction(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses account boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API account object
     */
    function parseAccount(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses block boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API block object
     */
    function parseBlock(ParamsOfParse $params): ResultOfParse;

    /**
     * Parses shardstate boc into a JSON
     *
     *  JSON structure is compatible with GraphQL API shardstate object
     */
    function parseShardstate(ParamsOfParseShardstate $params): ResultOfParse;

    function getBlockchainConfig(ParamsOfGetBlockchainConfig $params): ResultOfGetBlockchainConfig;

    /**
     * Calculates BOC root hash
     */
    function getBocHash(ParamsOfGetBocHash $params): ResultOfGetBocHash;
}
