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

    /**
     * @param ParamsOfGetBocDepth $params
     * @return ResultOfGetBocDepth
     */
    public function getBocDepth(ParamsOfGetBocDepth $params): ResultOfGetBocDepth
    {
        return new ResultOfGetBocDepth($this->_context->callFunction('boc.get_boc_depth', $params));
    }

    /**
     * @param ParamsOfGetCodeFromTvc $params
     * @return ResultOfGetCodeFromTvc
     */
    public function getCodeFromTvc(ParamsOfGetCodeFromTvc $params): ResultOfGetCodeFromTvc
    {
        return new ResultOfGetCodeFromTvc($this->_context->callFunction('boc.get_code_from_tvc', $params));
    }

    /**
     * @param ParamsOfBocCacheGet $params
     * @return ResultOfBocCacheGet
     */
    public function cacheGet(ParamsOfBocCacheGet $params): ResultOfBocCacheGet
    {
        return new ResultOfBocCacheGet($this->_context->callFunction('boc.cache_get', $params));
    }

    /**
     * @param ParamsOfBocCacheSet $params
     * @return ResultOfBocCacheSet
     */
    public function cacheSet(ParamsOfBocCacheSet $params): ResultOfBocCacheSet
    {
        return new ResultOfBocCacheSet($this->_context->callFunction('boc.cache_set', $params));
    }

    /**
     * BOCs which don't have another pins will be removed from cache
     * @param ParamsOfBocCacheUnpin $params
     */
    public function cacheUnpin(ParamsOfBocCacheUnpin $params)
    {
        $this->_context->callFunction('boc.cache_unpin', $params);
    }

    /**
     * @param ParamsOfEncodeBoc $params
     * @return ResultOfEncodeBoc
     */
    public function encodeBoc(ParamsOfEncodeBoc $params): ResultOfEncodeBoc
    {
        return new ResultOfEncodeBoc($this->_context->callFunction('boc.encode_boc', $params));
    }

    /**
     * @param ParamsOfGetCodeSalt $params
     * @return ResultOfGetCodeSalt
     */
    public function getCodeSalt(ParamsOfGetCodeSalt $params): ResultOfGetCodeSalt
    {
        return new ResultOfGetCodeSalt($this->_context->callFunction('boc.get_code_salt', $params));
    }

    /**
     * Returns the new contract code with salt.
     * @param ParamsOfSetCodeSalt $params
     * @return ResultOfSetCodeSalt
     */
    public function setCodeSalt(ParamsOfSetCodeSalt $params): ResultOfSetCodeSalt
    {
        return new ResultOfSetCodeSalt($this->_context->callFunction('boc.set_code_salt', $params));
    }

    /**
     * @param ParamsOfDecodeTvc $params
     * @return ResultOfDecodeTvc
     */
    public function decodeTvc(ParamsOfDecodeTvc $params): ResultOfDecodeTvc
    {
        return new ResultOfDecodeTvc($this->_context->callFunction('boc.decode_tvc', $params));
    }

    /**
     * @param ParamsOfEncodeTvc $params
     * @return ResultOfEncodeTvc
     */
    public function encodeTvc(ParamsOfEncodeTvc $params): ResultOfEncodeTvc
    {
        return new ResultOfEncodeTvc($this->_context->callFunction('boc.encode_tvc', $params));
    }

    /**
     * @param ParamsOfGetCompilerVersion $params
     * @return ResultOfGetCompilerVersion
     */
    public function getCompilerVersion(ParamsOfGetCompilerVersion $params): ResultOfGetCompilerVersion
    {
        return new ResultOfGetCompilerVersion($this->_context->callFunction('boc.get_compiler_version', $params));
    }
}
