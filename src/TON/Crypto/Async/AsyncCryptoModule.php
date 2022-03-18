<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

use TON\AsyncResult;
use TON\Crypto\KeyPair;
use TON\Crypto\ParamsOfChaCha20;
use TON\Crypto\ParamsOfConvertPublicKeyToTonSafeFormat;
use TON\Crypto\ParamsOfCreateCryptoBox;
use TON\Crypto\ParamsOfCreateEncryptionBox;
use TON\Crypto\ParamsOfEncryptionBoxDecrypt;
use TON\Crypto\ParamsOfEncryptionBoxEncrypt;
use TON\Crypto\ParamsOfEncryptionBoxGetInfo;
use TON\Crypto\ParamsOfFactorize;
use TON\Crypto\ParamsOfGenerateRandomBytes;
use TON\Crypto\ParamsOfGetEncryptionBoxFromCryptoBox;
use TON\Crypto\ParamsOfGetSigningBoxFromCryptoBox;
use TON\Crypto\ParamsOfHDKeyDeriveFromXPrv;
use TON\Crypto\ParamsOfHDKeyDeriveFromXPrvPath;
use TON\Crypto\ParamsOfHDKeyPublicFromXPrv;
use TON\Crypto\ParamsOfHDKeySecretFromXPrv;
use TON\Crypto\ParamsOfHDKeyXPrvFromMnemonic;
use TON\Crypto\ParamsOfHash;
use TON\Crypto\ParamsOfMnemonicDeriveSignKeys;
use TON\Crypto\ParamsOfMnemonicFromEntropy;
use TON\Crypto\ParamsOfMnemonicFromRandom;
use TON\Crypto\ParamsOfMnemonicVerify;
use TON\Crypto\ParamsOfMnemonicWords;
use TON\Crypto\ParamsOfModularPower;
use TON\Crypto\ParamsOfNaclBox;
use TON\Crypto\ParamsOfNaclBoxKeyPairFromSecret;
use TON\Crypto\ParamsOfNaclBoxOpen;
use TON\Crypto\ParamsOfNaclSecretBox;
use TON\Crypto\ParamsOfNaclSecretBoxOpen;
use TON\Crypto\ParamsOfNaclSign;
use TON\Crypto\ParamsOfNaclSignDetachedVerify;
use TON\Crypto\ParamsOfNaclSignKeyPairFromSecret;
use TON\Crypto\ParamsOfNaclSignOpen;
use TON\Crypto\ParamsOfScrypt;
use TON\Crypto\ParamsOfSign;
use TON\Crypto\ParamsOfSigningBoxSign;
use TON\Crypto\ParamsOfTonCrc16;
use TON\Crypto\ParamsOfVerifySignature;
use TON\Crypto\RegisteredCryptoBox;
use TON\Crypto\RegisteredEncryptionBox;
use TON\Crypto\RegisteredSigningBox;
use TON\TonContext;

class AsyncCryptoModule implements CryptoModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncCryptoModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Performs prime factorization – decomposition of a composite number
     * into a product of smaller prime integers (factors).
     * See [https://en.wikipedia.org/wiki/Integer_factorization]
     * @param ParamsOfFactorize $params
     * @return AsyncResultOfFactorize
     */
    public function factorizeAsync(ParamsOfFactorize $params): AsyncResultOfFactorize
    {
        return new AsyncResultOfFactorize($this->_context->callFunctionAsync('crypto.factorize', $params));
    }

    /**
     * Performs modular exponentiation for big integers (`base`^`exponent` mod `modulus`).
     * See [https://en.wikipedia.org/wiki/Modular_exponentiation]
     * @param ParamsOfModularPower $params
     * @return AsyncResultOfModularPower
     */
    public function modularPowerAsync(ParamsOfModularPower $params): AsyncResultOfModularPower
    {
        return new AsyncResultOfModularPower($this->_context->callFunctionAsync('crypto.modular_power', $params));
    }

    /**
     * @param ParamsOfTonCrc16 $params
     * @return AsyncResultOfTonCrc16
     */
    public function tonCrc16Async(ParamsOfTonCrc16 $params): AsyncResultOfTonCrc16
    {
        return new AsyncResultOfTonCrc16($this->_context->callFunctionAsync('crypto.ton_crc16', $params));
    }

    /**
     * @param ParamsOfGenerateRandomBytes $params
     * @return AsyncResultOfGenerateRandomBytes
     */
    public function generateRandomBytesAsync(ParamsOfGenerateRandomBytes $params): AsyncResultOfGenerateRandomBytes
    {
        return new AsyncResultOfGenerateRandomBytes($this->_context->callFunctionAsync('crypto.generate_random_bytes', $params));
    }

    /**
     * @param ParamsOfConvertPublicKeyToTonSafeFormat $params
     * @return AsyncResultOfConvertPublicKeyToTonSafeFormat
     */
    public function convertPublicKeyToTonSafeFormatAsync(ParamsOfConvertPublicKeyToTonSafeFormat $params): AsyncResultOfConvertPublicKeyToTonSafeFormat
    {
        return new AsyncResultOfConvertPublicKeyToTonSafeFormat($this->_context->callFunctionAsync('crypto.convert_public_key_to_ton_safe_format', $params));
    }

    /**
     * @return AsyncKeyPair
     */
    public function generateRandomSignKeysAsync(): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.generate_random_sign_keys'));
    }

    /**
     * @param ParamsOfSign $params
     * @return AsyncResultOfSign
     */
    public function signAsync(ParamsOfSign $params): AsyncResultOfSign
    {
        return new AsyncResultOfSign($this->_context->callFunctionAsync('crypto.sign', $params));
    }

    /**
     * @param ParamsOfVerifySignature $params
     * @return AsyncResultOfVerifySignature
     */
    public function verifySignatureAsync(ParamsOfVerifySignature $params): AsyncResultOfVerifySignature
    {
        return new AsyncResultOfVerifySignature($this->_context->callFunctionAsync('crypto.verify_signature', $params));
    }

    /**
     * @param ParamsOfHash $params
     * @return AsyncResultOfHash
     */
    public function sha256Async(ParamsOfHash $params): AsyncResultOfHash
    {
        return new AsyncResultOfHash($this->_context->callFunctionAsync('crypto.sha256', $params));
    }

    /**
     * @param ParamsOfHash $params
     * @return AsyncResultOfHash
     */
    public function sha512Async(ParamsOfHash $params): AsyncResultOfHash
    {
        return new AsyncResultOfHash($this->_context->callFunctionAsync('crypto.sha512', $params));
    }

    /**
     * Derives key from `password` and `key` using `scrypt` algorithm.
     * See [https://en.wikipedia.org/wiki/Scrypt].
     *
     * # Arguments
     * - `log_n` - The log2 of the Scrypt parameter `N`
     * - `r` - The Scrypt parameter `r`
     * - `p` - The Scrypt parameter `p`
     * # Conditions
     * - `log_n` must be less than `64`
     * - `r` must be greater than `0` and less than or equal to `4294967295`
     * - `p` must be greater than `0` and less than `4294967295`
     * # Recommended values sufficient for most use-cases
     * - `log_n = 15` (`n = 32768`)
     * - `r = 8`
     * - `p = 1`
     * @param ParamsOfScrypt $params
     * @return AsyncResultOfScrypt
     */
    public function scryptAsync(ParamsOfScrypt $params): AsyncResultOfScrypt
    {
        return new AsyncResultOfScrypt($this->_context->callFunctionAsync('crypto.scrypt', $params));
    }

    /**
     * **NOTE:** In the result the secret key is actually the concatenation
     * of secret and public keys (128 symbols hex string) by design of [NaCL](http://nacl.cr.yp.to/sign.html).
     * See also [the stackexchange question](https://crypto.stackexchange.com/questions/54353/).
     * @param ParamsOfNaclSignKeyPairFromSecret $params
     * @return AsyncKeyPair
     */
    public function naclSignKeypairFromSecretKeyAsync(ParamsOfNaclSignKeyPairFromSecret $params): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.nacl_sign_keypair_from_secret_key', $params));
    }

    /**
     * @param ParamsOfNaclSign $params
     * @return AsyncResultOfNaclSign
     */
    public function naclSignAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSign
    {
        return new AsyncResultOfNaclSign($this->_context->callFunctionAsync('crypto.nacl_sign', $params));
    }

    /**
     * Verifies the signature in `signed` using the signer's public key `public`
     * and returns the message `unsigned`.
     *
     * If the signature fails verification, crypto_sign_open raises an exception.
     * @param ParamsOfNaclSignOpen $params
     * @return AsyncResultOfNaclSignOpen
     */
    public function naclSignOpenAsync(ParamsOfNaclSignOpen $params): AsyncResultOfNaclSignOpen
    {
        return new AsyncResultOfNaclSignOpen($this->_context->callFunctionAsync('crypto.nacl_sign_open', $params));
    }

    /**
     * Signs the message `unsigned` using the secret key `secret`
     * and returns a signature `signature`.
     * @param ParamsOfNaclSign $params
     * @return AsyncResultOfNaclSignDetached
     */
    public function naclSignDetachedAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSignDetached
    {
        return new AsyncResultOfNaclSignDetached($this->_context->callFunctionAsync('crypto.nacl_sign_detached', $params));
    }

    /**
     * @param ParamsOfNaclSignDetachedVerify $params
     * @return AsyncResultOfNaclSignDetachedVerify
     */
    public function naclSignDetachedVerifyAsync(ParamsOfNaclSignDetachedVerify $params): AsyncResultOfNaclSignDetachedVerify
    {
        return new AsyncResultOfNaclSignDetachedVerify($this->_context->callFunctionAsync('crypto.nacl_sign_detached_verify', $params));
    }

    /**
     * @return AsyncKeyPair
     */
    public function naclBoxKeypairAsync(): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.nacl_box_keypair'));
    }

    /**
     * @param ParamsOfNaclBoxKeyPairFromSecret $params
     * @return AsyncKeyPair
     */
    public function naclBoxKeypairFromSecretKeyAsync(ParamsOfNaclBoxKeyPairFromSecret $params): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.nacl_box_keypair_from_secret_key', $params));
    }

    /**
     * Encrypt and authenticate a message using the senders secret key, the receivers public
     * key, and a nonce.
     * @param ParamsOfNaclBox $params
     * @return AsyncResultOfNaclBox
     */
    public function naclBoxAsync(ParamsOfNaclBox $params): AsyncResultOfNaclBox
    {
        return new AsyncResultOfNaclBox($this->_context->callFunctionAsync('crypto.nacl_box', $params));
    }

    /**
     * @param ParamsOfNaclBoxOpen $params
     * @return AsyncResultOfNaclBoxOpen
     */
    public function naclBoxOpenAsync(ParamsOfNaclBoxOpen $params): AsyncResultOfNaclBoxOpen
    {
        return new AsyncResultOfNaclBoxOpen($this->_context->callFunctionAsync('crypto.nacl_box_open', $params));
    }

    /**
     * @param ParamsOfNaclSecretBox $params
     * @return AsyncResultOfNaclBox
     */
    public function naclSecretBoxAsync(ParamsOfNaclSecretBox $params): AsyncResultOfNaclBox
    {
        return new AsyncResultOfNaclBox($this->_context->callFunctionAsync('crypto.nacl_secret_box', $params));
    }

    /**
     * @param ParamsOfNaclSecretBoxOpen $params
     * @return AsyncResultOfNaclBoxOpen
     */
    public function naclSecretBoxOpenAsync(ParamsOfNaclSecretBoxOpen $params): AsyncResultOfNaclBoxOpen
    {
        return new AsyncResultOfNaclBoxOpen($this->_context->callFunctionAsync('crypto.nacl_secret_box_open', $params));
    }

    /**
     * @param ParamsOfMnemonicWords $params
     * @return AsyncResultOfMnemonicWords
     */
    public function mnemonicWordsAsync(ParamsOfMnemonicWords $params): AsyncResultOfMnemonicWords
    {
        return new AsyncResultOfMnemonicWords($this->_context->callFunctionAsync('crypto.mnemonic_words', $params));
    }

    /**
     * Generates a random mnemonic from the specified dictionary and word count
     * @param ParamsOfMnemonicFromRandom $params
     * @return AsyncResultOfMnemonicFromRandom
     */
    public function mnemonicFromRandomAsync(ParamsOfMnemonicFromRandom $params): AsyncResultOfMnemonicFromRandom
    {
        return new AsyncResultOfMnemonicFromRandom($this->_context->callFunctionAsync('crypto.mnemonic_from_random', $params));
    }

    /**
     * @param ParamsOfMnemonicFromEntropy $params
     * @return AsyncResultOfMnemonicFromEntropy
     */
    public function mnemonicFromEntropyAsync(ParamsOfMnemonicFromEntropy $params): AsyncResultOfMnemonicFromEntropy
    {
        return new AsyncResultOfMnemonicFromEntropy($this->_context->callFunctionAsync('crypto.mnemonic_from_entropy', $params));
    }

    /**
     * The phrase supplied will be checked for word length and validated according to the checksum
     * specified in BIP0039.
     * @param ParamsOfMnemonicVerify $params
     * @return AsyncResultOfMnemonicVerify
     */
    public function mnemonicVerifyAsync(ParamsOfMnemonicVerify $params): AsyncResultOfMnemonicVerify
    {
        return new AsyncResultOfMnemonicVerify($this->_context->callFunctionAsync('crypto.mnemonic_verify', $params));
    }

    /**
     * Validates the seed phrase, generates master key and then derives
     * the key pair from the master key and the specified path
     * @param ParamsOfMnemonicDeriveSignKeys $params
     * @return AsyncKeyPair
     */
    public function mnemonicDeriveSignKeysAsync(ParamsOfMnemonicDeriveSignKeys $params): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.mnemonic_derive_sign_keys', $params));
    }

    /**
     * @param ParamsOfHDKeyXPrvFromMnemonic $params
     * @return AsyncResultOfHDKeyXPrvFromMnemonic
     */
    public function hdkeyXprvFromMnemonicAsync(ParamsOfHDKeyXPrvFromMnemonic $params): AsyncResultOfHDKeyXPrvFromMnemonic
    {
        return new AsyncResultOfHDKeyXPrvFromMnemonic($this->_context->callFunctionAsync('crypto.hdkey_xprv_from_mnemonic', $params));
    }

    /**
     * @param ParamsOfHDKeyDeriveFromXPrv $params
     * @return AsyncResultOfHDKeyDeriveFromXPrv
     */
    public function hdkeyDeriveFromXprvAsync(ParamsOfHDKeyDeriveFromXPrv $params): AsyncResultOfHDKeyDeriveFromXPrv
    {
        return new AsyncResultOfHDKeyDeriveFromXPrv($this->_context->callFunctionAsync('crypto.hdkey_derive_from_xprv', $params));
    }

    /**
     * @param ParamsOfHDKeyDeriveFromXPrvPath $params
     * @return AsyncResultOfHDKeyDeriveFromXPrvPath
     */
    public function hdkeyDeriveFromXprvPathAsync(ParamsOfHDKeyDeriveFromXPrvPath $params): AsyncResultOfHDKeyDeriveFromXPrvPath
    {
        return new AsyncResultOfHDKeyDeriveFromXPrvPath($this->_context->callFunctionAsync('crypto.hdkey_derive_from_xprv_path', $params));
    }

    /**
     * @param ParamsOfHDKeySecretFromXPrv $params
     * @return AsyncResultOfHDKeySecretFromXPrv
     */
    public function hdkeySecretFromXprvAsync(ParamsOfHDKeySecretFromXPrv $params): AsyncResultOfHDKeySecretFromXPrv
    {
        return new AsyncResultOfHDKeySecretFromXPrv($this->_context->callFunctionAsync('crypto.hdkey_secret_from_xprv', $params));
    }

    /**
     * @param ParamsOfHDKeyPublicFromXPrv $params
     * @return AsyncResultOfHDKeyPublicFromXPrv
     */
    public function hdkeyPublicFromXprvAsync(ParamsOfHDKeyPublicFromXPrv $params): AsyncResultOfHDKeyPublicFromXPrv
    {
        return new AsyncResultOfHDKeyPublicFromXPrv($this->_context->callFunctionAsync('crypto.hdkey_public_from_xprv', $params));
    }

    /**
     * @param ParamsOfChaCha20 $params
     * @return AsyncResultOfChaCha20
     */
    public function chacha20Async(ParamsOfChaCha20 $params): AsyncResultOfChaCha20
    {
        return new AsyncResultOfChaCha20($this->_context->callFunctionAsync('crypto.chacha20', $params));
    }

    /**
     * Crypto Box is a root crypto object, that encapsulates some secret (seed phrase usually)
     * in encrypted form and acts as a factory for all crypto primitives used in SDK:
     * keys for signing and encryption, derived from this secret.
     *
     * Crypto Box encrypts original Seed Phrase with salt and password that is retrieved
     * from `password_provider` callback, implemented on Application side.
     *
     * When used, decrypted secret shows up in core library's memory for a very short period
     * of time and then is immediately overwritten with zeroes.
     * @param ParamsOfCreateCryptoBox $params
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredCryptoBox
     */
    public function createCryptoBoxAsync(ParamsOfCreateCryptoBox $params, callable $callback): AsyncRegisteredCryptoBox
    {
        return new AsyncRegisteredCryptoBox($this->_context->callFunctionAsync('crypto.create_crypto_box', $params, $callback));
    }

    /**
     * @param RegisteredCryptoBox $params
     * @return AsyncResult
     */
    public function removeCryptoBoxAsync(RegisteredCryptoBox $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('crypto.remove_crypto_box', $params));
    }

    /**
     * @param RegisteredCryptoBox $params
     * @return AsyncResultOfGetCryptoBoxInfo
     */
    public function getCryptoBoxInfoAsync(RegisteredCryptoBox $params): AsyncResultOfGetCryptoBoxInfo
    {
        return new AsyncResultOfGetCryptoBoxInfo($this->_context->callFunctionAsync('crypto.get_crypto_box_info', $params));
    }

    /**
     * Attention! Store this data in your application for a very short period of time and overwrite it with zeroes ASAP.
     * @param RegisteredCryptoBox $params
     * @return AsyncResultOfGetCryptoBoxSeedPhrase
     */
    public function getCryptoBoxSeedPhraseAsync(RegisteredCryptoBox $params): AsyncResultOfGetCryptoBoxSeedPhrase
    {
        return new AsyncResultOfGetCryptoBoxSeedPhrase($this->_context->callFunctionAsync('crypto.get_crypto_box_seed_phrase', $params));
    }

    /**
     * @param ParamsOfGetSigningBoxFromCryptoBox $params
     * @return AsyncRegisteredSigningBox
     */
    public function getSigningBoxFromCryptoBoxAsync(ParamsOfGetSigningBoxFromCryptoBox $params): AsyncRegisteredSigningBox
    {
        return new AsyncRegisteredSigningBox($this->_context->callFunctionAsync('crypto.get_signing_box_from_crypto_box', $params));
    }

    /**
     * Derives encryption keypair from cryptobox secret and hdpath and
     * stores it in cache for `secret_lifetime`
     * or until explicitly cleared by `clear_crypto_box_secret_cache` method.
     * If `secret_lifetime` is not specified - overwrites encryption secret with zeroes immediately after
     * encryption operation.
     * @param ParamsOfGetEncryptionBoxFromCryptoBox $params
     * @return AsyncRegisteredEncryptionBox
     */
    public function getEncryptionBoxFromCryptoBoxAsync(ParamsOfGetEncryptionBoxFromCryptoBox $params): AsyncRegisteredEncryptionBox
    {
        return new AsyncRegisteredEncryptionBox($this->_context->callFunctionAsync('crypto.get_encryption_box_from_crypto_box', $params));
    }

    /**
     * @param RegisteredCryptoBox $params
     * @return AsyncResult
     */
    public function clearCryptoBoxSecretCacheAsync(RegisteredCryptoBox $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('crypto.clear_crypto_box_secret_cache', $params));
    }

    /**
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredSigningBox
     */
    public function registerSigningBoxAsync(callable $callback): AsyncRegisteredSigningBox
    {
        return new AsyncRegisteredSigningBox($this->_context->callFunctionAsync('crypto.register_signing_box', null, $callback));
    }

    /**
     * @param KeyPair $params
     * @return AsyncRegisteredSigningBox
     */
    public function getSigningBoxAsync(KeyPair $params): AsyncRegisteredSigningBox
    {
        return new AsyncRegisteredSigningBox($this->_context->callFunctionAsync('crypto.get_signing_box', $params));
    }

    /**
     * @param RegisteredSigningBox $params
     * @return AsyncResultOfSigningBoxGetPublicKey
     */
    public function signingBoxGetPublicKeyAsync(RegisteredSigningBox $params): AsyncResultOfSigningBoxGetPublicKey
    {
        return new AsyncResultOfSigningBoxGetPublicKey($this->_context->callFunctionAsync('crypto.signing_box_get_public_key', $params));
    }

    /**
     * @param ParamsOfSigningBoxSign $params
     * @return AsyncResultOfSigningBoxSign
     */
    public function signingBoxSignAsync(ParamsOfSigningBoxSign $params): AsyncResultOfSigningBoxSign
    {
        return new AsyncResultOfSigningBoxSign($this->_context->callFunctionAsync('crypto.signing_box_sign', $params));
    }

    /**
     * @param RegisteredSigningBox $params
     * @return AsyncResult
     */
    public function removeSigningBoxAsync(RegisteredSigningBox $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('crypto.remove_signing_box', $params));
    }

    /**
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredEncryptionBox
     */
    public function registerEncryptionBoxAsync(callable $callback): AsyncRegisteredEncryptionBox
    {
        return new AsyncRegisteredEncryptionBox($this->_context->callFunctionAsync('crypto.register_encryption_box', null, $callback));
    }

    /**
     * @param RegisteredEncryptionBox $params
     * @return AsyncResult
     */
    public function removeEncryptionBoxAsync(RegisteredEncryptionBox $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('crypto.remove_encryption_box', $params));
    }

    /**
     * @param ParamsOfEncryptionBoxGetInfo $params
     * @return AsyncResultOfEncryptionBoxGetInfo
     */
    public function encryptionBoxGetInfoAsync(ParamsOfEncryptionBoxGetInfo $params): AsyncResultOfEncryptionBoxGetInfo
    {
        return new AsyncResultOfEncryptionBoxGetInfo($this->_context->callFunctionAsync('crypto.encryption_box_get_info', $params));
    }

    /**
     * Block cipher algorithms pad data to cipher block size so encrypted data can be longer then original data. Client should store the original data size after encryption and use it after
     * decryption to retrieve the original data from decrypted data.
     * @param ParamsOfEncryptionBoxEncrypt $params
     * @return AsyncResultOfEncryptionBoxEncrypt
     */
    public function encryptionBoxEncryptAsync(ParamsOfEncryptionBoxEncrypt $params): AsyncResultOfEncryptionBoxEncrypt
    {
        return new AsyncResultOfEncryptionBoxEncrypt($this->_context->callFunctionAsync('crypto.encryption_box_encrypt', $params));
    }

    /**
     * Block cipher algorithms pad data to cipher block size so encrypted data can be longer then original data. Client should store the original data size after encryption and use it after
     * decryption to retrieve the original data from decrypted data.
     * @param ParamsOfEncryptionBoxDecrypt $params
     * @return AsyncResultOfEncryptionBoxDecrypt
     */
    public function encryptionBoxDecryptAsync(ParamsOfEncryptionBoxDecrypt $params): AsyncResultOfEncryptionBoxDecrypt
    {
        return new AsyncResultOfEncryptionBoxDecrypt($this->_context->callFunctionAsync('crypto.encryption_box_decrypt', $params));
    }

    /**
     * @param ParamsOfCreateEncryptionBox $params
     * @return AsyncRegisteredEncryptionBox
     */
    public function createEncryptionBoxAsync(ParamsOfCreateEncryptionBox $params): AsyncRegisteredEncryptionBox
    {
        return new AsyncRegisteredEncryptionBox($this->_context->callFunctionAsync('crypto.create_encryption_box', $params));
    }
}
