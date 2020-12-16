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
use TON\Crypto\ParamsOfFactorize;
use TON\Crypto\ParamsOfGenerateRandomBytes;
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
use TON\Crypto\ParamsOfNaclSignKeyPairFromSecret;
use TON\Crypto\ParamsOfNaclSignOpen;
use TON\Crypto\ParamsOfScrypt;
use TON\Crypto\ParamsOfSign;
use TON\Crypto\ParamsOfSigningBoxSign;
use TON\Crypto\ParamsOfTonCrc16;
use TON\Crypto\ParamsOfVerifySignature;
use TON\Crypto\RegisteredSigningBox;
use TON\TonContext;

/**
 * Crypto functions.
 */
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
     *  into a product of smaller prime integers (factors).
     *  See [https://en.wikipedia.org/wiki/Integer_factorization]
     * @param ParamsOfFactorize $params
     * @return AsyncResultOfFactorize
     */
    public function factorizeAsync(ParamsOfFactorize $params): AsyncResultOfFactorize
    {
        return new AsyncResultOfFactorize($this->_context->callFunctionAsync('crypto.factorize', $params));
    }

    /**
     * Performs modular exponentiation for big integers (`base`^`exponent` mod `modulus`).
     *  See [https://en.wikipedia.org/wiki/Modular_exponentiation]
     * @param ParamsOfModularPower $params
     * @return AsyncResultOfModularPower
     */
    public function modularPowerAsync(ParamsOfModularPower $params): AsyncResultOfModularPower
    {
        return new AsyncResultOfModularPower($this->_context->callFunctionAsync('crypto.modular_power', $params));
    }

    /**
     * Calculates CRC16 using TON algorithm.
     * @param ParamsOfTonCrc16 $params
     * @return AsyncResultOfTonCrc16
     */
    public function tonCrc16Async(ParamsOfTonCrc16 $params): AsyncResultOfTonCrc16
    {
        return new AsyncResultOfTonCrc16($this->_context->callFunctionAsync('crypto.ton_crc16', $params));
    }

    /**
     * Generates random byte array of the specified length and returns it in `base64` format
     * @param ParamsOfGenerateRandomBytes $params
     * @return AsyncResultOfGenerateRandomBytes
     */
    public function generateRandomBytesAsync(ParamsOfGenerateRandomBytes $params): AsyncResultOfGenerateRandomBytes
    {
        return new AsyncResultOfGenerateRandomBytes($this->_context->callFunctionAsync('crypto.generate_random_bytes', $params));
    }

    /**
     * Converts public key to ton safe_format
     * @param ParamsOfConvertPublicKeyToTonSafeFormat $params
     * @return AsyncResultOfConvertPublicKeyToTonSafeFormat
     */
    public function convertPublicKeyToTonSafeFormatAsync(ParamsOfConvertPublicKeyToTonSafeFormat $params): AsyncResultOfConvertPublicKeyToTonSafeFormat
    {
        return new AsyncResultOfConvertPublicKeyToTonSafeFormat($this->_context->callFunctionAsync('crypto.convert_public_key_to_ton_safe_format', $params));
    }

    /**
     * Generates random ed25519 key pair.
     * @return AsyncKeyPair
     */
    public function generateRandomSignKeysAsync(): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.generate_random_sign_keys'));
    }

    /**
     * Signs a data using the provided keys.
     * @param ParamsOfSign $params
     * @return AsyncResultOfSign
     */
    public function signAsync(ParamsOfSign $params): AsyncResultOfSign
    {
        return new AsyncResultOfSign($this->_context->callFunctionAsync('crypto.sign', $params));
    }

    /**
     * Verifies signed data using the provided public key.
     *  Raises error if verification is failed.
     * @param ParamsOfVerifySignature $params
     * @return AsyncResultOfVerifySignature
     */
    public function verifySignatureAsync(ParamsOfVerifySignature $params): AsyncResultOfVerifySignature
    {
        return new AsyncResultOfVerifySignature($this->_context->callFunctionAsync('crypto.verify_signature', $params));
    }

    /**
     * Calculates SHA256 hash of the specified data.
     * @param ParamsOfHash $params
     * @return AsyncResultOfHash
     */
    public function sha256Async(ParamsOfHash $params): AsyncResultOfHash
    {
        return new AsyncResultOfHash($this->_context->callFunctionAsync('crypto.sha256', $params));
    }

    /**
     * Calculates SHA512 hash of the specified data.
     * @param ParamsOfHash $params
     * @return AsyncResultOfHash
     */
    public function sha512Async(ParamsOfHash $params): AsyncResultOfHash
    {
        return new AsyncResultOfHash($this->_context->callFunctionAsync('crypto.sha512', $params));
    }

    /**
     * Derives key from `password` and `key` using `scrypt` algorithm.
     *  See [https://en.wikipedia.org/wiki/Scrypt].
     *
     *  # Arguments
     *  - `log_n` - The log2 of the Scrypt parameter `N`
     *  - `r` - The Scrypt parameter `r`
     *  - `p` - The Scrypt parameter `p`
     *  # Conditions
     *  - `log_n` must be less than `64`
     *  - `r` must be greater than `0` and less than or equal to `4294967295`
     *  - `p` must be greater than `0` and less than `4294967295`
     *  # Recommended values sufficient for most use-cases
     *  - `log_n = 15` (`n = 32768`)
     *  - `r = 8`
     *  - `p = 1`
     * @param ParamsOfScrypt $params
     * @return AsyncResultOfScrypt
     */
    public function scryptAsync(ParamsOfScrypt $params): AsyncResultOfScrypt
    {
        return new AsyncResultOfScrypt($this->_context->callFunctionAsync('crypto.scrypt', $params));
    }

    /**
     * Generates a key pair for signing from the secret key
     * @param ParamsOfNaclSignKeyPairFromSecret $params
     * @return AsyncKeyPair
     */
    public function naclSignKeypairFromSecretKeyAsync(ParamsOfNaclSignKeyPairFromSecret $params): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.nacl_sign_keypair_from_secret_key', $params));
    }

    /**
     * Signs data using the signer's secret key.
     * @param ParamsOfNaclSign $params
     * @return AsyncResultOfNaclSign
     */
    public function naclSignAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSign
    {
        return new AsyncResultOfNaclSign($this->_context->callFunctionAsync('crypto.nacl_sign', $params));
    }

    /**
     * @param ParamsOfNaclSignOpen $params
     * @return AsyncResultOfNaclSignOpen
     */
    public function naclSignOpenAsync(ParamsOfNaclSignOpen $params): AsyncResultOfNaclSignOpen
    {
        return new AsyncResultOfNaclSignOpen($this->_context->callFunctionAsync('crypto.nacl_sign_open', $params));
    }

    /**
     * @param ParamsOfNaclSign $params
     * @return AsyncResultOfNaclSignDetached
     */
    public function naclSignDetachedAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSignDetached
    {
        return new AsyncResultOfNaclSignDetached($this->_context->callFunctionAsync('crypto.nacl_sign_detached', $params));
    }

    /**
     * @return AsyncKeyPair
     */
    public function naclBoxKeypairAsync(): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.nacl_box_keypair'));
    }

    /**
     * Generates key pair from a secret key
     * @param ParamsOfNaclBoxKeyPairFromSecret $params
     * @return AsyncKeyPair
     */
    public function naclBoxKeypairFromSecretKeyAsync(ParamsOfNaclBoxKeyPairFromSecret $params): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.nacl_box_keypair_from_secret_key', $params));
    }

    /**
     * Public key authenticated encryption
     *
     *  Encrypt and authenticate a message using the senders secret key, the recievers public
     *  key, and a nonce.
     * @param ParamsOfNaclBox $params
     * @return AsyncResultOfNaclBox
     */
    public function naclBoxAsync(ParamsOfNaclBox $params): AsyncResultOfNaclBox
    {
        return new AsyncResultOfNaclBox($this->_context->callFunctionAsync('crypto.nacl_box', $params));
    }

    /**
     * Decrypt and verify the cipher text using the recievers secret key, the senders public
     *  key, and the nonce.
     * @param ParamsOfNaclBoxOpen $params
     * @return AsyncResultOfNaclBoxOpen
     */
    public function naclBoxOpenAsync(ParamsOfNaclBoxOpen $params): AsyncResultOfNaclBoxOpen
    {
        return new AsyncResultOfNaclBoxOpen($this->_context->callFunctionAsync('crypto.nacl_box_open', $params));
    }

    /**
     * Encrypt and authenticate message using nonce and secret key.
     * @param ParamsOfNaclSecretBox $params
     * @return AsyncResultOfNaclBox
     */
    public function naclSecretBoxAsync(ParamsOfNaclSecretBox $params): AsyncResultOfNaclBox
    {
        return new AsyncResultOfNaclBox($this->_context->callFunctionAsync('crypto.nacl_secret_box', $params));
    }

    /**
     * Decrypts and verifies cipher text using `nonce` and secret `key`.
     * @param ParamsOfNaclSecretBoxOpen $params
     * @return AsyncResultOfNaclBoxOpen
     */
    public function naclSecretBoxOpenAsync(ParamsOfNaclSecretBoxOpen $params): AsyncResultOfNaclBoxOpen
    {
        return new AsyncResultOfNaclBoxOpen($this->_context->callFunctionAsync('crypto.nacl_secret_box_open', $params));
    }

    /**
     * Prints the list of words from the specified dictionary
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
     * Generates mnemonic from pre-generated entropy
     * @param ParamsOfMnemonicFromEntropy $params
     * @return AsyncResultOfMnemonicFromEntropy
     */
    public function mnemonicFromEntropyAsync(ParamsOfMnemonicFromEntropy $params): AsyncResultOfMnemonicFromEntropy
    {
        return new AsyncResultOfMnemonicFromEntropy($this->_context->callFunctionAsync('crypto.mnemonic_from_entropy', $params));
    }

    /**
     * The phrase supplied will be checked for word length and validated according to the checksum
     *  specified in BIP0039.
     * @param ParamsOfMnemonicVerify $params
     * @return AsyncResultOfMnemonicVerify
     */
    public function mnemonicVerifyAsync(ParamsOfMnemonicVerify $params): AsyncResultOfMnemonicVerify
    {
        return new AsyncResultOfMnemonicVerify($this->_context->callFunctionAsync('crypto.mnemonic_verify', $params));
    }

    /**
     * Validates the seed phrase, generates master key and then derives
     *  the key pair from the master key and the specified path
     * @param ParamsOfMnemonicDeriveSignKeys $params
     * @return AsyncKeyPair
     */
    public function mnemonicDeriveSignKeysAsync(ParamsOfMnemonicDeriveSignKeys $params): AsyncKeyPair
    {
        return new AsyncKeyPair($this->_context->callFunctionAsync('crypto.mnemonic_derive_sign_keys', $params));
    }

    /**
     * Generates an extended master private key that will be the root for all the derived keys
     * @param ParamsOfHDKeyXPrvFromMnemonic $params
     * @return AsyncResultOfHDKeyXPrvFromMnemonic
     */
    public function hdkeyXprvFromMnemonicAsync(ParamsOfHDKeyXPrvFromMnemonic $params): AsyncResultOfHDKeyXPrvFromMnemonic
    {
        return new AsyncResultOfHDKeyXPrvFromMnemonic($this->_context->callFunctionAsync('crypto.hdkey_xprv_from_mnemonic', $params));
    }

    /**
     * Returns extended private key derived from the specified extended private key and child index
     * @param ParamsOfHDKeyDeriveFromXPrv $params
     * @return AsyncResultOfHDKeyDeriveFromXPrv
     */
    public function hdkeyDeriveFromXprvAsync(ParamsOfHDKeyDeriveFromXPrv $params): AsyncResultOfHDKeyDeriveFromXPrv
    {
        return new AsyncResultOfHDKeyDeriveFromXPrv($this->_context->callFunctionAsync('crypto.hdkey_derive_from_xprv', $params));
    }

    /**
     * Derives the extended private key from the specified key and path
     * @param ParamsOfHDKeyDeriveFromXPrvPath $params
     * @return AsyncResultOfHDKeyDeriveFromXPrvPath
     */
    public function hdkeyDeriveFromXprvPathAsync(ParamsOfHDKeyDeriveFromXPrvPath $params): AsyncResultOfHDKeyDeriveFromXPrvPath
    {
        return new AsyncResultOfHDKeyDeriveFromXPrvPath($this->_context->callFunctionAsync('crypto.hdkey_derive_from_xprv_path', $params));
    }

    /**
     * Extracts the private key from the serialized extended private key
     * @param ParamsOfHDKeySecretFromXPrv $params
     * @return AsyncResultOfHDKeySecretFromXPrv
     */
    public function hdkeySecretFromXprvAsync(ParamsOfHDKeySecretFromXPrv $params): AsyncResultOfHDKeySecretFromXPrv
    {
        return new AsyncResultOfHDKeySecretFromXPrv($this->_context->callFunctionAsync('crypto.hdkey_secret_from_xprv', $params));
    }

    /**
     * Extracts the public key from the serialized extended private key
     * @param ParamsOfHDKeyPublicFromXPrv $params
     * @return AsyncResultOfHDKeyPublicFromXPrv
     */
    public function hdkeyPublicFromXprvAsync(ParamsOfHDKeyPublicFromXPrv $params): AsyncResultOfHDKeyPublicFromXPrv
    {
        return new AsyncResultOfHDKeyPublicFromXPrv($this->_context->callFunctionAsync('crypto.hdkey_public_from_xprv', $params));
    }

    /**
     * Performs symmetric `chacha20` encryption.
     * @param ParamsOfChaCha20 $params
     * @return AsyncResultOfChaCha20
     */
    public function chacha20Async(ParamsOfChaCha20 $params): AsyncResultOfChaCha20
    {
        return new AsyncResultOfChaCha20($this->_context->callFunctionAsync('crypto.chacha20', $params));
    }

    /**
     * Register an application implemented signing box.
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredSigningBox
     */
    public function registerSigningBoxAsync(callable $callback): AsyncRegisteredSigningBox
    {
        return new AsyncRegisteredSigningBox($this->_context->callFunctionAsync('crypto.register_signing_box', null, $callback));
    }

    /**
     * Creates a default signing box implementation.
     * @param KeyPair $params
     * @return AsyncRegisteredSigningBox
     */
    public function getSigningBoxAsync(KeyPair $params): AsyncRegisteredSigningBox
    {
        return new AsyncRegisteredSigningBox($this->_context->callFunctionAsync('crypto.get_signing_box', $params));
    }

    /**
     * Returns public key of signing key pair.
     * @param RegisteredSigningBox $params
     * @return AsyncResultOfSigningBoxGetPublicKey
     */
    public function signingBoxGetPublicKeyAsync(RegisteredSigningBox $params): AsyncResultOfSigningBoxGetPublicKey
    {
        return new AsyncResultOfSigningBoxGetPublicKey($this->_context->callFunctionAsync('crypto.signing_box_get_public_key', $params));
    }

    /**
     * Returns signed user data.
     * @param ParamsOfSigningBoxSign $params
     * @return AsyncResultOfSigningBoxSign
     */
    public function signingBoxSignAsync(ParamsOfSigningBoxSign $params): AsyncResultOfSigningBoxSign
    {
        return new AsyncResultOfSigningBoxSign($this->_context->callFunctionAsync('crypto.signing_box_sign', $params));
    }

    /**
     * Removes signing box from SDK.
     * @param RegisteredSigningBox $params
     * @return AsyncResult
     */
    public function removeSigningBoxAsync(RegisteredSigningBox $params): AsyncResult
    {
        return new AsyncResult($this->_context->callFunctionAsync('crypto.remove_signing_box', $params));
    }
}
