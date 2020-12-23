<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi\Async;

use TON\Abi\ParamsOfAttachSignature;
use TON\Abi\ParamsOfAttachSignatureToMessageBody;
use TON\Abi\ParamsOfDecodeMessage;
use TON\Abi\ParamsOfDecodeMessageBody;
use TON\Abi\ParamsOfEncodeAccount;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\ParamsOfEncodeMessageBody;

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
     * [SOON] `Signer::SigningBox` Allows using a special interface to imlepement signing
     * without private key disclosure to SDK. For instance, in case of using a cold wallet or HSM,
     * when application calls some API to sign data.
     * @param ParamsOfEncodeMessage $params
     * @return AsyncResultOfEncodeMessage
     */
    function encodeMessageAsync(ParamsOfEncodeMessage $params): AsyncResultOfEncodeMessage;

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
}
