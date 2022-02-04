<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

use TON\Abi\ParamsOfAbiEncodeBoc;
use TON\Abi\ParamsOfAttachSignature;
use TON\Abi\ParamsOfAttachSignatureToMessageBody;
use TON\Abi\ParamsOfDecodeAccountData;
use TON\Abi\ParamsOfDecodeBoc;
use TON\Abi\ParamsOfDecodeInitialData;
use TON\Abi\ParamsOfDecodeMessage;
use TON\Abi\ParamsOfDecodeMessageBody;
use TON\Abi\ParamsOfEncodeAccount;
use TON\Abi\ParamsOfEncodeInitialData;
use TON\Abi\ParamsOfEncodeInternalMessage;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\ParamsOfEncodeMessageBody;
use TON\Abi\ParamsOfUpdateInitialData;
use TON\TonContext;

class AsyncAbiModule implements AbiModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncAbiModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @param ParamsOfEncodeMessageBody $params
     * @return AsyncResultOfEncodeMessageBody
     */
    public function encodeMessageBodyAsync(ParamsOfEncodeMessageBody $params): AsyncResultOfEncodeMessageBody
    {
        return new AsyncResultOfEncodeMessageBody($this->_context->callFunctionAsync('abi.encode_message_body', $params));
    }

    /**
     * @param ParamsOfAttachSignatureToMessageBody $params
     * @return AsyncResultOfAttachSignatureToMessageBody
     */
    public function attachSignatureToMessageBodyAsync(ParamsOfAttachSignatureToMessageBody $params): AsyncResultOfAttachSignatureToMessageBody
    {
        return new AsyncResultOfAttachSignatureToMessageBody($this->_context->callFunctionAsync('abi.attach_signature_to_message_body', $params));
    }

    /**
     * Allows to encode deploy and function call messages,
     * both signed and unsigned.
     *
     * Use cases include messages of any possible type:
     * - deploy with initial function call (i.e. `constructor` or any other function that is used for some kind
     * of initialization);
     * - deploy without initial function call;
     * - signed/unsigned + data for signing.
     *
     * `Signer` defines how the message should or shouldn't be signed:
     *
     * `Signer::None` creates an unsigned message. This may be needed in case of some public methods,
     * that do not require authorization by pubkey.
     *
     * `Signer::External` takes public key and returns `data_to_sign` for later signing.
     * Use `attach_signature` method with the result signature to get the signed message.
     *
     * `Signer::Keys` creates a signed message with provided key pair.
     *
     * [SOON] `Signer::SigningBox` Allows using a special interface to implement signing
     * without private key disclosure to SDK. For instance, in case of using a cold wallet or HSM,
     * when application calls some API to sign data.
     *
     * There is an optional public key can be provided in deploy set in order to substitute one
     * in TVM file.
     *
     * Public key resolving priority:
     * 1. Public key from deploy set.
     * 2. Public key, specified in TVM file.
     * 3. Public key, provided by signer.
     * @param ParamsOfEncodeMessage $params
     * @return AsyncResultOfEncodeMessage
     */
    public function encodeMessageAsync(ParamsOfEncodeMessage $params): AsyncResultOfEncodeMessage
    {
        return new AsyncResultOfEncodeMessage($this->_context->callFunctionAsync('abi.encode_message', $params));
    }

    /**
     * Allows to encode deploy and function call messages.
     *
     * Use cases include messages of any possible type:
     * - deploy with initial function call (i.e. `constructor` or any other function that is used for some kind
     * of initialization);
     * - deploy without initial function call;
     * - simple function call
     *
     * There is an optional public key can be provided in deploy set in order to substitute one
     * in TVM file.
     *
     * Public key resolving priority:
     * 1. Public key from deploy set.
     * 2. Public key, specified in TVM file.
     * @param ParamsOfEncodeInternalMessage $params
     * @return AsyncResultOfEncodeInternalMessage
     */
    public function encodeInternalMessageAsync(ParamsOfEncodeInternalMessage $params): AsyncResultOfEncodeInternalMessage
    {
        return new AsyncResultOfEncodeInternalMessage($this->_context->callFunctionAsync('abi.encode_internal_message', $params));
    }

    /**
     * @param ParamsOfAttachSignature $params
     * @return AsyncResultOfAttachSignature
     */
    public function attachSignatureAsync(ParamsOfAttachSignature $params): AsyncResultOfAttachSignature
    {
        return new AsyncResultOfAttachSignature($this->_context->callFunctionAsync('abi.attach_signature', $params));
    }

    /**
     * @param ParamsOfDecodeMessage $params
     * @return AsyncDecodedMessageBody
     */
    public function decodeMessageAsync(ParamsOfDecodeMessage $params): AsyncDecodedMessageBody
    {
        return new AsyncDecodedMessageBody($this->_context->callFunctionAsync('abi.decode_message', $params));
    }

    /**
     * @param ParamsOfDecodeMessageBody $params
     * @return AsyncDecodedMessageBody
     */
    public function decodeMessageBodyAsync(ParamsOfDecodeMessageBody $params): AsyncDecodedMessageBody
    {
        return new AsyncDecodedMessageBody($this->_context->callFunctionAsync('abi.decode_message_body', $params));
    }

    /**
     * Creates account state provided with one of these sets of data :
     * 1. BOC of code, BOC of data, BOC of library
     * 2. TVC (string in `base64`), keys, init params
     * @param ParamsOfEncodeAccount $params
     * @return AsyncResultOfEncodeAccount
     */
    public function encodeAccountAsync(ParamsOfEncodeAccount $params): AsyncResultOfEncodeAccount
    {
        return new AsyncResultOfEncodeAccount($this->_context->callFunctionAsync('abi.encode_account', $params));
    }

    /**
     * Note: this feature requires ABI 2.1 or higher.
     * @param ParamsOfDecodeAccountData $params
     * @return AsyncResultOfDecodeAccountData
     */
    public function decodeAccountDataAsync(ParamsOfDecodeAccountData $params): AsyncResultOfDecodeAccountData
    {
        return new AsyncResultOfDecodeAccountData($this->_context->callFunctionAsync('abi.decode_account_data', $params));
    }

    /**
     * @param ParamsOfUpdateInitialData $params
     * @return AsyncResultOfUpdateInitialData
     */
    public function updateInitialDataAsync(ParamsOfUpdateInitialData $params): AsyncResultOfUpdateInitialData
    {
        return new AsyncResultOfUpdateInitialData($this->_context->callFunctionAsync('abi.update_initial_data', $params));
    }

    /**
     * This function is analogue of `tvm.buildDataInit` function in Solidity.
     * @param ParamsOfEncodeInitialData $params
     * @return AsyncResultOfEncodeInitialData
     */
    public function encodeInitialDataAsync(ParamsOfEncodeInitialData $params): AsyncResultOfEncodeInitialData
    {
        return new AsyncResultOfEncodeInitialData($this->_context->callFunctionAsync('abi.encode_initial_data', $params));
    }

    /**
     * @param ParamsOfDecodeInitialData $params
     * @return AsyncResultOfDecodeInitialData
     */
    public function decodeInitialDataAsync(ParamsOfDecodeInitialData $params): AsyncResultOfDecodeInitialData
    {
        return new AsyncResultOfDecodeInitialData($this->_context->callFunctionAsync('abi.decode_initial_data', $params));
    }

    /**
     * Solidity functions use ABI types for [builder encoding](https://github.com/tonlabs/TON-Solidity-Compiler/blob/master/API.md#tvmbuilderstore).
     * The simplest way to decode such a BOC is to use ABI decoding.
     * ABI has it own rules for fields layout in cells so manually encoded
     * BOC can not be described in terms of ABI rules.
     *
     * To solve this problem we introduce a new ABI type `Ref(<ParamType>)`
     * which allows to store `ParamType` ABI parameter in cell reference and, thus,
     * decode manually encoded BOCs. This type is available only in `decode_boc` function
     * and will not be available in ABI messages encoding until it is included into some ABI revision.
     *
     * Such BOC descriptions covers most users needs. If someone wants to decode some BOC which
     * can not be described by these rules (i.e. BOC with TLB containing constructors of flags
     * defining some parsing conditions) then they can decode the fields up to fork condition,
     * check the parsed data manually, expand the parsing schema and then decode the whole BOC
     * with the full schema.
     * @param ParamsOfDecodeBoc $params
     * @return AsyncResultOfDecodeBoc
     */
    public function decodeBocAsync(ParamsOfDecodeBoc $params): AsyncResultOfDecodeBoc
    {
        return new AsyncResultOfDecodeBoc($this->_context->callFunctionAsync('abi.decode_boc', $params));
    }

    /**
     * @param ParamsOfAbiEncodeBoc $params
     * @return AsyncResultOfAbiEncodeBoc
     */
    public function encodeBocAsync(ParamsOfAbiEncodeBoc $params): AsyncResultOfAbiEncodeBoc
    {
        return new AsyncResultOfAbiEncodeBoc($this->_context->callFunctionAsync('abi.encode_boc', $params));
    }
}
