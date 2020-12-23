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
     * [SOON] `Signer::SigningBox` Allows using a special interface to imlepement signing
     * without private key disclosure to SDK. For instance, in case of using a cold wallet or HSM,
     * when application calls some API to sign data.
     * @param ParamsOfEncodeMessage $params
     * @return ResultOfEncodeMessage
     */
    function encodeMessage(ParamsOfEncodeMessage $params): ResultOfEncodeMessage;

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
}
