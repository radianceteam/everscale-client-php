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

    /**
     * @param ParamsOfGetBocDepth $params
     * @return ResultOfGetBocDepth
     */
    function getBocDepth(ParamsOfGetBocDepth $params): ResultOfGetBocDepth;

    /**
     * @param ParamsOfGetCodeFromTvc $params
     * @return ResultOfGetCodeFromTvc
     */
    function getCodeFromTvc(ParamsOfGetCodeFromTvc $params): ResultOfGetCodeFromTvc;

    /**
     * @param ParamsOfBocCacheGet $params
     * @return ResultOfBocCacheGet
     */
    function cacheGet(ParamsOfBocCacheGet $params): ResultOfBocCacheGet;

    /**
     * @param ParamsOfBocCacheSet $params
     * @return ResultOfBocCacheSet
     */
    function cacheSet(ParamsOfBocCacheSet $params): ResultOfBocCacheSet;

    /**
     * @param ParamsOfBocCacheUnpin $params
     */
    function cacheUnpin(ParamsOfBocCacheUnpin $params);

    /**
     * @param ParamsOfEncodeBoc $params
     * @return ResultOfEncodeBoc
     */
    function encodeBoc(ParamsOfEncodeBoc $params): ResultOfEncodeBoc;

    /**
     * @param ParamsOfGetCodeSalt $params
     * @return ResultOfGetCodeSalt
     */
    function getCodeSalt(ParamsOfGetCodeSalt $params): ResultOfGetCodeSalt;

    /**
     * Returns the new contract code with salt.
     * @param ParamsOfSetCodeSalt $params
     * @return ResultOfSetCodeSalt
     */
    function setCodeSalt(ParamsOfSetCodeSalt $params): ResultOfSetCodeSalt;

    /**
     * @param ParamsOfDecodeTvc $params
     * @return ResultOfDecodeTvc
     */
    function decodeTvc(ParamsOfDecodeTvc $params): ResultOfDecodeTvc;

    /**
     * @param ParamsOfEncodeTvc $params
     * @return ResultOfEncodeTvc
     */
    function encodeTvc(ParamsOfEncodeTvc $params): ResultOfEncodeTvc;

    /**
     * Allows to encode any external inbound message.
     * @param ParamsOfEncodeExternalInMessage $params
     * @return ResultOfEncodeExternalInMessage
     */
    function encodeExternalInMessage(ParamsOfEncodeExternalInMessage $params): ResultOfEncodeExternalInMessage;

    /**
     * @param ParamsOfGetCompilerVersion $params
     * @return ResultOfGetCompilerVersion
     */
    function getCompilerVersion(ParamsOfGetCompilerVersion $params): ResultOfGetCompilerVersion;
}
