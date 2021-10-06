<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use TON\Abi\Async\AbiModuleAsyncInterface;

interface AbiModuleInterface
{
    /**
     * @return AbiModuleAsyncInterface Async version of abi module interface.
     */
    function async(): AbiModuleAsyncInterface;

    /**
     * @param ParamsOfEncodeMessageBody $params
     * @return ResultOfEncodeMessageBody
     */
    function encodeMessageBody(ParamsOfEncodeMessageBody $params): ResultOfEncodeMessageBody;

    /**
     * @param ParamsOfAttachSignatureToMessageBody $params
     * @return ResultOfAttachSignatureToMessageBody
     */
    function attachSignatureToMessageBody(ParamsOfAttachSignatureToMessageBody $params): ResultOfAttachSignatureToMessageBody;

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
    function encodeMessage(ParamsOfEncodeMessage $params): ResultOfEncodeMessage;

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
    function encodeInternalMessage(ParamsOfEncodeInternalMessage $params): ResultOfEncodeInternalMessage;

    /**
     * @param ParamsOfAttachSignature $params
     * @return ResultOfAttachSignature
     */
    function attachSignature(ParamsOfAttachSignature $params): ResultOfAttachSignature;

    /**
     * @param ParamsOfDecodeMessage $params
     * @return DecodedMessageBody
     */
    function decodeMessage(ParamsOfDecodeMessage $params): DecodedMessageBody;

    /**
     * @param ParamsOfDecodeMessageBody $params
     * @return DecodedMessageBody
     */
    function decodeMessageBody(ParamsOfDecodeMessageBody $params): DecodedMessageBody;

    /**
     * Creates account state provided with one of these sets of data :
     * 1. BOC of code, BOC of data, BOC of library
     * 2. TVC (string in `base64`), keys, init params
     * @param ParamsOfEncodeAccount $params
     * @return ResultOfEncodeAccount
     */
    function encodeAccount(ParamsOfEncodeAccount $params): ResultOfEncodeAccount;

    /**
     * Note: this feature requires ABI 2.1 or higher.
     * @param ParamsOfDecodeAccountData $params
     * @return ResultOfDecodeData
     */
    function decodeAccountData(ParamsOfDecodeAccountData $params): ResultOfDecodeData;

    /**
     * @param ParamsOfUpdateInitialData $params
     * @return ResultOfUpdateInitialData
     */
    function updateInitialData(ParamsOfUpdateInitialData $params): ResultOfUpdateInitialData;

    /**
     * @param ParamsOfDecodeInitialData $params
     * @return ResultOfDecodeInitialData
     */
    function decodeInitialData(ParamsOfDecodeInitialData $params): ResultOfDecodeInitialData;
}
