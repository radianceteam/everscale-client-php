<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use TON\Abi\Async\AbiModuleAsyncInterface;
use TON\Abi\Async\AsyncAbiModule;
use TON\TonContext;

class AbiModule implements AbiModuleInterface
{
    private TonContext $_context;

    /**
     * AbiModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return AbiModuleAsyncInterface Async version of abi module interface.
     */
    public function async(): AbiModuleAsyncInterface
    {
        return new AsyncAbiModule($this->_context);
    }

    /**
     * @param ParamsOfEncodeMessageBody $params
     * @return ResultOfEncodeMessageBody
     */
    public function encodeMessageBody(ParamsOfEncodeMessageBody $params): ResultOfEncodeMessageBody
    {
        return new ResultOfEncodeMessageBody($this->_context->callFunction('abi.encode_message_body', $params));
    }

    /**
     * @param ParamsOfAttachSignatureToMessageBody $params
     * @return ResultOfAttachSignatureToMessageBody
     */
    public function attachSignatureToMessageBody(ParamsOfAttachSignatureToMessageBody $params): ResultOfAttachSignatureToMessageBody
    {
        return new ResultOfAttachSignatureToMessageBody($this->_context->callFunction('abi.attach_signature_to_message_body', $params));
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
     * @return ResultOfEncodeMessage
     */
    public function encodeMessage(ParamsOfEncodeMessage $params): ResultOfEncodeMessage
    {
        return new ResultOfEncodeMessage($this->_context->callFunction('abi.encode_message', $params));
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
     * @return ResultOfEncodeInternalMessage
     */
    public function encodeInternalMessage(ParamsOfEncodeInternalMessage $params): ResultOfEncodeInternalMessage
    {
        return new ResultOfEncodeInternalMessage($this->_context->callFunction('abi.encode_internal_message', $params));
    }

    /**
     * @param ParamsOfAttachSignature $params
     * @return ResultOfAttachSignature
     */
    public function attachSignature(ParamsOfAttachSignature $params): ResultOfAttachSignature
    {
        return new ResultOfAttachSignature($this->_context->callFunction('abi.attach_signature', $params));
    }

    /**
     * @param ParamsOfDecodeMessage $params
     * @return DecodedMessageBody
     */
    public function decodeMessage(ParamsOfDecodeMessage $params): DecodedMessageBody
    {
        return new DecodedMessageBody($this->_context->callFunction('abi.decode_message', $params));
    }

    /**
     * @param ParamsOfDecodeMessageBody $params
     * @return DecodedMessageBody
     */
    public function decodeMessageBody(ParamsOfDecodeMessageBody $params): DecodedMessageBody
    {
        return new DecodedMessageBody($this->_context->callFunction('abi.decode_message_body', $params));
    }

    /**
     * Creates account state provided with one of these sets of data :
     * 1. BOC of code, BOC of data, BOC of library
     * 2. TVC (string in `base64`), keys, init params
     * @param ParamsOfEncodeAccount $params
     * @return ResultOfEncodeAccount
     */
    public function encodeAccount(ParamsOfEncodeAccount $params): ResultOfEncodeAccount
    {
        return new ResultOfEncodeAccount($this->_context->callFunction('abi.encode_account', $params));
    }

    /**
     * Note: this feature requires ABI 2.1 or higher.
     * @param ParamsOfDecodeAccountData $params
     * @return ResultOfDecodeAccountData
     */
    public function decodeAccountData(ParamsOfDecodeAccountData $params): ResultOfDecodeAccountData
    {
        return new ResultOfDecodeAccountData($this->_context->callFunction('abi.decode_account_data', $params));
    }

    /**
     * @param ParamsOfUpdateInitialData $params
     * @return ResultOfUpdateInitialData
     */
    public function updateInitialData(ParamsOfUpdateInitialData $params): ResultOfUpdateInitialData
    {
        return new ResultOfUpdateInitialData($this->_context->callFunction('abi.update_initial_data', $params));
    }

    /**
     * This function is analogue of `tvm.buildDataInit` function in Solidity.
     * @param ParamsOfEncodeInitialData $params
     * @return ResultOfEncodeInitialData
     */
    public function encodeInitialData(ParamsOfEncodeInitialData $params): ResultOfEncodeInitialData
    {
        return new ResultOfEncodeInitialData($this->_context->callFunction('abi.encode_initial_data', $params));
    }

    /**
     * @param ParamsOfDecodeInitialData $params
     * @return ResultOfDecodeInitialData
     */
    public function decodeInitialData(ParamsOfDecodeInitialData $params): ResultOfDecodeInitialData
    {
        return new ResultOfDecodeInitialData($this->_context->callFunction('abi.decode_initial_data', $params));
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
     * @return ResultOfDecodeBoc
     */
    public function decodeBoc(ParamsOfDecodeBoc $params): ResultOfDecodeBoc
    {
        return new ResultOfDecodeBoc($this->_context->callFunction('abi.decode_boc', $params));
    }
}
