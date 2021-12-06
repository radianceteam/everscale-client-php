<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

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

interface AbiModuleAsyncInterface
{
    /**
     * @param ParamsOfEncodeMessageBody $params
     * @return AsyncResultOfEncodeMessageBody
     */
    function encodeMessageBodyAsync(ParamsOfEncodeMessageBody $params): AsyncResultOfEncodeMessageBody;

    /**
     * @param ParamsOfAttachSignatureToMessageBody $params
     * @return AsyncResultOfAttachSignatureToMessageBody
     */
    function attachSignatureToMessageBodyAsync(ParamsOfAttachSignatureToMessageBody $params): AsyncResultOfAttachSignatureToMessageBody;

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
    function encodeMessageAsync(ParamsOfEncodeMessage $params): AsyncResultOfEncodeMessage;

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
    function encodeInternalMessageAsync(ParamsOfEncodeInternalMessage $params): AsyncResultOfEncodeInternalMessage;

    /**
     * @param ParamsOfAttachSignature $params
     * @return AsyncResultOfAttachSignature
     */
    function attachSignatureAsync(ParamsOfAttachSignature $params): AsyncResultOfAttachSignature;

    /**
     * @param ParamsOfDecodeMessage $params
     * @return AsyncDecodedMessageBody
     */
    function decodeMessageAsync(ParamsOfDecodeMessage $params): AsyncDecodedMessageBody;

    /**
     * @param ParamsOfDecodeMessageBody $params
     * @return AsyncDecodedMessageBody
     */
    function decodeMessageBodyAsync(ParamsOfDecodeMessageBody $params): AsyncDecodedMessageBody;

    /**
     * Creates account state provided with one of these sets of data :
     * 1. BOC of code, BOC of data, BOC of library
     * 2. TVC (string in `base64`), keys, init params
     * @param ParamsOfEncodeAccount $params
     * @return AsyncResultOfEncodeAccount
     */
    function encodeAccountAsync(ParamsOfEncodeAccount $params): AsyncResultOfEncodeAccount;

    /**
     * Note: this feature requires ABI 2.1 or higher.
     * @param ParamsOfDecodeAccountData $params
     * @return AsyncResultOfDecodeAccountData
     */
    function decodeAccountDataAsync(ParamsOfDecodeAccountData $params): AsyncResultOfDecodeAccountData;

    /**
     * @param ParamsOfUpdateInitialData $params
     * @return AsyncResultOfUpdateInitialData
     */
    function updateInitialDataAsync(ParamsOfUpdateInitialData $params): AsyncResultOfUpdateInitialData;

    /**
     * This function is analogue of `tvm.buildDataInit` function in Solidity.
     * @param ParamsOfEncodeInitialData $params
     * @return AsyncResultOfEncodeInitialData
     */
    function encodeInitialDataAsync(ParamsOfEncodeInitialData $params): AsyncResultOfEncodeInitialData;

    /**
     * @param ParamsOfDecodeInitialData $params
     * @return AsyncResultOfDecodeInitialData
     */
    function decodeInitialDataAsync(ParamsOfDecodeInitialData $params): AsyncResultOfDecodeInitialData;

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
    function decodeBocAsync(ParamsOfDecodeBoc $params): AsyncResultOfDecodeBoc;
}
