<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

use TON\Abi\Async\AbiModuleAsyncInterface;

/**
 * Provides message encoding and decoding according to the ABI
 *  specification.
 */
interface AbiModuleInterface
{
    /**
     * @return AbiModuleAsyncInterface Async version of abi module interface.
     */
    function async(): AbiModuleAsyncInterface;

    /**
     * Encodes message body according to ABI function call.
     */
    function encodeMessageBody(ParamsOfEncodeMessageBody $params): ResultOfEncodeMessageBody;

    function attachSignatureToMessageBody(ParamsOfAttachSignatureToMessageBody $params): ResultOfAttachSignatureToMessageBody;

    /**
     * Encodes an ABI-compatible message
     *
     *  Allows to encode deploy and function call messages,
     *  both signed and unsigned.
     *
     *  Use cases include messages of any possible type:
     *  - deploy with initial function call (i.e. `constructor` or any other function that is used for some kind
     *  of initialization);
     *  - deploy without initial function call;
     *  - signed/unsigned + data for signing.
     *
     *  `Signer` defines how the message should or shouldn't be signed:
     *
     *  `Signer::None` creates an unsigned message. This may be needed in case of some public methods,
     *  that do not require authorization by pubkey.
     *
     *  `Signer::External` takes public key and returns `data_to_sign` for later signing.
     *  Use `attach_signature` method with the result signature to get the signed message.
     *
     *  `Signer::Keys` creates a signed message with provided key pair.
     *
     *  [SOON] `Signer::SigningBox` Allows using a special interface to imlepement signing
     *  without private key disclosure to SDK. For instance, in case of using a cold wallet or HSM,
     *  when application calls some API to sign data.
     */
    function encodeMessage(ParamsOfEncodeMessage $params): ResultOfEncodeMessage;

    /**
     * Combines `hex`-encoded `signature` with `base64`-encoded `unsigned_message`.
     *  Returns signed message encoded in `base64`.
     */
    function attachSignature(ParamsOfAttachSignature $params): ResultOfAttachSignature;

    /**
     * Decodes message body using provided message BOC and ABI.
     */
    function decodeMessage(ParamsOfDecodeMessage $params): DecodedMessageBody;

    /**
     * Decodes message body using provided body BOC and ABI.
     */
    function decodeMessageBody(ParamsOfDecodeMessageBody $params): DecodedMessageBody;

    /**
     * Creates account state BOC
     *
     *  Creates account state provided with one of these sets of data :
     *  1. BOC of code, BOC of data, BOC of library
     *  2. TVC (string in `base64`), keys, init params
     */
    function encodeAccount(ParamsOfEncodeAccount $params): ResultOfEncodeAccount;
}
