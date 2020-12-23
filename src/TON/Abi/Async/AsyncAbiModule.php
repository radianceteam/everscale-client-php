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
     * [SOON] `Signer::SigningBox` Allows using a special interface to imlepement signing
     * without private key disclosure to SDK. For instance, in case of using a cold wallet or HSM,
     * when application calls some API to sign data.
     * @param ParamsOfEncodeMessage $params
     * @return AsyncResultOfEncodeMessage
     */
    public function encodeMessageAsync(ParamsOfEncodeMessage $params): AsyncResultOfEncodeMessage
    {
        return new AsyncResultOfEncodeMessage($this->_context->callFunctionAsync('abi.encode_message', $params));
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
}
