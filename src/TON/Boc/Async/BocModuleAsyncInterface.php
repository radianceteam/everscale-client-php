<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc\Async;

use TON\AsyncResult;
use TON\Boc\ParamsOfBocCacheGet;
use TON\Boc\ParamsOfBocCacheSet;
use TON\Boc\ParamsOfBocCacheUnpin;
use TON\Boc\ParamsOfDecodeTvc;
use TON\Boc\ParamsOfEncodeBoc;
use TON\Boc\ParamsOfEncodeExternalInMessage;
use TON\Boc\ParamsOfEncodeTvc;
use TON\Boc\ParamsOfGetBlockchainConfig;
use TON\Boc\ParamsOfGetBocDepth;
use TON\Boc\ParamsOfGetBocHash;
use TON\Boc\ParamsOfGetCodeFromTvc;
use TON\Boc\ParamsOfGetCodeSalt;
use TON\Boc\ParamsOfGetCompilerVersion;
use TON\Boc\ParamsOfParse;
use TON\Boc\ParamsOfParseShardstate;
use TON\Boc\ParamsOfSetCodeSalt;

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
     * @param ParamsOfGetBocDepth $params
     * @return AsyncResultOfGetBocDepth
     */
    function getBocDepthAsync(ParamsOfGetBocDepth $params): AsyncResultOfGetBocDepth;

    /**
     * @param ParamsOfGetCodeFromTvc $params
     * @return AsyncResultOfGetCodeFromTvc
     */
    function getCodeFromTvcAsync(ParamsOfGetCodeFromTvc $params): AsyncResultOfGetCodeFromTvc;

    /**
     * @param ParamsOfBocCacheGet $params
     * @return AsyncResultOfBocCacheGet
     */
    function cacheGetAsync(ParamsOfBocCacheGet $params): AsyncResultOfBocCacheGet;

    /**
     * @param ParamsOfBocCacheSet $params
     * @return AsyncResultOfBocCacheSet
     */
    function cacheSetAsync(ParamsOfBocCacheSet $params): AsyncResultOfBocCacheSet;

    /**
     * @param ParamsOfBocCacheUnpin $params
     * @return AsyncResult
     */
    function cacheUnpinAsync(ParamsOfBocCacheUnpin $params): AsyncResult;

    /**
     * @param ParamsOfEncodeBoc $params
     * @return AsyncResultOfEncodeBoc
     */
    function encodeBocAsync(ParamsOfEncodeBoc $params): AsyncResultOfEncodeBoc;

    /**
     * @param ParamsOfGetCodeSalt $params
     * @return AsyncResultOfGetCodeSalt
     */
    function getCodeSaltAsync(ParamsOfGetCodeSalt $params): AsyncResultOfGetCodeSalt;

    /**
     * Returns the new contract code with salt.
     * @param ParamsOfSetCodeSalt $params
     * @return AsyncResultOfSetCodeSalt
     */
    function setCodeSaltAsync(ParamsOfSetCodeSalt $params): AsyncResultOfSetCodeSalt;

    /**
     * @param ParamsOfDecodeTvc $params
     * @return AsyncResultOfDecodeTvc
     */
    function decodeTvcAsync(ParamsOfDecodeTvc $params): AsyncResultOfDecodeTvc;

    /**
     * @param ParamsOfEncodeTvc $params
     * @return AsyncResultOfEncodeTvc
     */
    function encodeTvcAsync(ParamsOfEncodeTvc $params): AsyncResultOfEncodeTvc;

    /**
     * Allows to encode any external inbound message.
     * @param ParamsOfEncodeExternalInMessage $params
     * @return AsyncResultOfEncodeExternalInMessage
     */
    function encodeExternalInMessageAsync(ParamsOfEncodeExternalInMessage $params): AsyncResultOfEncodeExternalInMessage;

    /**
     * @param ParamsOfGetCompilerVersion $params
     * @return AsyncResultOfGetCompilerVersion
     */
    function getCompilerVersionAsync(ParamsOfGetCompilerVersion $params): AsyncResultOfGetCompilerVersion;
}
