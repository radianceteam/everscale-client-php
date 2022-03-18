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

interface CryptoModuleAsyncInterface
{
    /**
     * Performs prime factorization – decomposition of a composite number
     * into a product of smaller prime integers (factors).
     * See [https://en.wikipedia.org/wiki/Integer_factorization]
     * @param ParamsOfFactorize $params
     * @return AsyncResultOfFactorize
     */
    function factorizeAsync(ParamsOfFactorize $params): AsyncResultOfFactorize;

    /**
     * Performs modular exponentiation for big integers (`base`^`exponent` mod `modulus`).
     * See [https://en.wikipedia.org/wiki/Modular_exponentiation]
     * @param ParamsOfModularPower $params
     * @return AsyncResultOfModularPower
     */
    function modularPowerAsync(ParamsOfModularPower $params): AsyncResultOfModularPower;

    /**
     * @param ParamsOfTonCrc16 $params
     * @return AsyncResultOfTonCrc16
     */
    function tonCrc16Async(ParamsOfTonCrc16 $params): AsyncResultOfTonCrc16;

    /**
     * @param ParamsOfGenerateRandomBytes $params
     * @return AsyncResultOfGenerateRandomBytes
     */
    function generateRandomBytesAsync(ParamsOfGenerateRandomBytes $params): AsyncResultOfGenerateRandomBytes;

    /**
     * @param ParamsOfConvertPublicKeyToTonSafeFormat $params
     * @return AsyncResultOfConvertPublicKeyToTonSafeFormat
     */
    function convertPublicKeyToTonSafeFormatAsync(ParamsOfConvertPublicKeyToTonSafeFormat $params): AsyncResultOfConvertPublicKeyToTonSafeFormat;

    /**
     * @return AsyncKeyPair
     */
    function generateRandomSignKeysAsync(): AsyncKeyPair;

    /**
     * @param ParamsOfSign $params
     * @return AsyncResultOfSign
     */
    function signAsync(ParamsOfSign $params): AsyncResultOfSign;

    /**
     * @param ParamsOfVerifySignature $params
     * @return AsyncResultOfVerifySignature
     */
    function verifySignatureAsync(ParamsOfVerifySignature $params): AsyncResultOfVerifySignature;

    /**
     * @param ParamsOfHash $params
     * @return AsyncResultOfHash
     */
    function sha256Async(ParamsOfHash $params): AsyncResultOfHash;

    /**
     * @param ParamsOfHash $params
     * @return AsyncResultOfHash
     */
    function sha512Async(ParamsOfHash $params): AsyncResultOfHash;

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
    function scryptAsync(ParamsOfScrypt $params): AsyncResultOfScrypt;

    /**
     * **NOTE:** In the result the secret key is actually the concatenation
     * of secret and public keys (128 symbols hex string) by design of [NaCL](http://nacl.cr.yp.to/sign.html).
     * See also [the stackexchange question](https://crypto.stackexchange.com/questions/54353/).
     * @param ParamsOfNaclSignKeyPairFromSecret $params
     * @return AsyncKeyPair
     */
    function naclSignKeypairFromSecretKeyAsync(ParamsOfNaclSignKeyPairFromSecret $params): AsyncKeyPair;

    /**
     * @param ParamsOfNaclSign $params
     * @return AsyncResultOfNaclSign
     */
    function naclSignAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSign;

    /**
     * Verifies the signature in `signed` using the signer's public key `public`
     * and returns the message `unsigned`.
     *
     * If the signature fails verification, crypto_sign_open raises an exception.
     * @param ParamsOfNaclSignOpen $params
     * @return AsyncResultOfNaclSignOpen
     */
    function naclSignOpenAsync(ParamsOfNaclSignOpen $params): AsyncResultOfNaclSignOpen;

    /**
     * Signs the message `unsigned` using the secret key `secret`
     * and returns a signature `signature`.
     * @param ParamsOfNaclSign $params
     * @return AsyncResultOfNaclSignDetached
     */
    function naclSignDetachedAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSignDetached;

    /**
     * @param ParamsOfNaclSignDetachedVerify $params
     * @return AsyncResultOfNaclSignDetachedVerify
     */
    function naclSignDetachedVerifyAsync(ParamsOfNaclSignDetachedVerify $params): AsyncResultOfNaclSignDetachedVerify;

    /**
     * @return AsyncKeyPair
     */
    function naclBoxKeypairAsync(): AsyncKeyPair;

    /**
     * @param ParamsOfNaclBoxKeyPairFromSecret $params
     * @return AsyncKeyPair
     */
    function naclBoxKeypairFromSecretKeyAsync(ParamsOfNaclBoxKeyPairFromSecret $params): AsyncKeyPair;

    /**
     * Encrypt and authenticate a message using the senders secret key, the receivers public
     * key, and a nonce.
     * @param ParamsOfNaclBox $params
     * @return AsyncResultOfNaclBox
     */
    function naclBoxAsync(ParamsOfNaclBox $params): AsyncResultOfNaclBox;

    /**
     * @param ParamsOfNaclBoxOpen $params
     * @return AsyncResultOfNaclBoxOpen
     */
    function naclBoxOpenAsync(ParamsOfNaclBoxOpen $params): AsyncResultOfNaclBoxOpen;

    /**
     * @param ParamsOfNaclSecretBox $params
     * @return AsyncResultOfNaclBox
     */
    function naclSecretBoxAsync(ParamsOfNaclSecretBox $params): AsyncResultOfNaclBox;

    /**
     * @param ParamsOfNaclSecretBoxOpen $params
     * @return AsyncResultOfNaclBoxOpen
     */
    function naclSecretBoxOpenAsync(ParamsOfNaclSecretBoxOpen $params): AsyncResultOfNaclBoxOpen;

    /**
     * @param ParamsOfMnemonicWords $params
     * @return AsyncResultOfMnemonicWords
     */
    function mnemonicWordsAsync(ParamsOfMnemonicWords $params): AsyncResultOfMnemonicWords;

    /**
     * Generates a random mnemonic from the specified dictionary and word count
     * @param ParamsOfMnemonicFromRandom $params
     * @return AsyncResultOfMnemonicFromRandom
     */
    function mnemonicFromRandomAsync(ParamsOfMnemonicFromRandom $params): AsyncResultOfMnemonicFromRandom;

    /**
     * @param ParamsOfMnemonicFromEntropy $params
     * @return AsyncResultOfMnemonicFromEntropy
     */
    function mnemonicFromEntropyAsync(ParamsOfMnemonicFromEntropy $params): AsyncResultOfMnemonicFromEntropy;

    /**
     * The phrase supplied will be checked for word length and validated according to the checksum
     * specified in BIP0039.
     * @param ParamsOfMnemonicVerify $params
     * @return AsyncResultOfMnemonicVerify
     */
    function mnemonicVerifyAsync(ParamsOfMnemonicVerify $params): AsyncResultOfMnemonicVerify;

    /**
     * Validates the seed phrase, generates master key and then derives
     * the key pair from the master key and the specified path
     * @param ParamsOfMnemonicDeriveSignKeys $params
     * @return AsyncKeyPair
     */
    function mnemonicDeriveSignKeysAsync(ParamsOfMnemonicDeriveSignKeys $params): AsyncKeyPair;

    /**
     * @param ParamsOfHDKeyXPrvFromMnemonic $params
     * @return AsyncResultOfHDKeyXPrvFromMnemonic
     */
    function hdkeyXprvFromMnemonicAsync(ParamsOfHDKeyXPrvFromMnemonic $params): AsyncResultOfHDKeyXPrvFromMnemonic;

    /**
     * @param ParamsOfHDKeyDeriveFromXPrv $params
     * @return AsyncResultOfHDKeyDeriveFromXPrv
     */
    function hdkeyDeriveFromXprvAsync(ParamsOfHDKeyDeriveFromXPrv $params): AsyncResultOfHDKeyDeriveFromXPrv;

    /**
     * @param ParamsOfHDKeyDeriveFromXPrvPath $params
     * @return AsyncResultOfHDKeyDeriveFromXPrvPath
     */
    function hdkeyDeriveFromXprvPathAsync(ParamsOfHDKeyDeriveFromXPrvPath $params): AsyncResultOfHDKeyDeriveFromXPrvPath;

    /**
     * @param ParamsOfHDKeySecretFromXPrv $params
     * @return AsyncResultOfHDKeySecretFromXPrv
     */
    function hdkeySecretFromXprvAsync(ParamsOfHDKeySecretFromXPrv $params): AsyncResultOfHDKeySecretFromXPrv;

    /**
     * @param ParamsOfHDKeyPublicFromXPrv $params
     * @return AsyncResultOfHDKeyPublicFromXPrv
     */
    function hdkeyPublicFromXprvAsync(ParamsOfHDKeyPublicFromXPrv $params): AsyncResultOfHDKeyPublicFromXPrv;

    /**
     * @param ParamsOfChaCha20 $params
     * @return AsyncResultOfChaCha20
     */
    function chacha20Async(ParamsOfChaCha20 $params): AsyncResultOfChaCha20;

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
    function createCryptoBoxAsync(ParamsOfCreateCryptoBox $params, callable $callback): AsyncRegisteredCryptoBox;

    /**
     * @param RegisteredCryptoBox $params
     * @return AsyncResult
     */
    function removeCryptoBoxAsync(RegisteredCryptoBox $params): AsyncResult;

    /**
     * @param RegisteredCryptoBox $params
     * @return AsyncResultOfGetCryptoBoxInfo
     */
    function getCryptoBoxInfoAsync(RegisteredCryptoBox $params): AsyncResultOfGetCryptoBoxInfo;

    /**
     * Attention! Store this data in your application for a very short period of time and overwrite it with zeroes ASAP.
     * @param RegisteredCryptoBox $params
     * @return AsyncResultOfGetCryptoBoxSeedPhrase
     */
    function getCryptoBoxSeedPhraseAsync(RegisteredCryptoBox $params): AsyncResultOfGetCryptoBoxSeedPhrase;

    /**
     * @param ParamsOfGetSigningBoxFromCryptoBox $params
     * @return AsyncRegisteredSigningBox
     */
    function getSigningBoxFromCryptoBoxAsync(ParamsOfGetSigningBoxFromCryptoBox $params): AsyncRegisteredSigningBox;

    /**
     * Derives encryption keypair from cryptobox secret and hdpath and
     * stores it in cache for `secret_lifetime`
     * or until explicitly cleared by `clear_crypto_box_secret_cache` method.
     * If `secret_lifetime` is not specified - overwrites encryption secret with zeroes immediately after
     * encryption operation.
     * @param ParamsOfGetEncryptionBoxFromCryptoBox $params
     * @return AsyncRegisteredEncryptionBox
     */
    function getEncryptionBoxFromCryptoBoxAsync(ParamsOfGetEncryptionBoxFromCryptoBox $params): AsyncRegisteredEncryptionBox;

    /**
     * @param RegisteredCryptoBox $params
     * @return AsyncResult
     */
    function clearCryptoBoxSecretCacheAsync(RegisteredCryptoBox $params): AsyncResult;

    /**
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredSigningBox
     */
    function registerSigningBoxAsync(callable $callback): AsyncRegisteredSigningBox;

    /**
     * @param KeyPair $params
     * @return AsyncRegisteredSigningBox
     */
    function getSigningBoxAsync(KeyPair $params): AsyncRegisteredSigningBox;

    /**
     * @param RegisteredSigningBox $params
     * @return AsyncResultOfSigningBoxGetPublicKey
     */
    function signingBoxGetPublicKeyAsync(RegisteredSigningBox $params): AsyncResultOfSigningBoxGetPublicKey;

    /**
     * @param ParamsOfSigningBoxSign $params
     * @return AsyncResultOfSigningBoxSign
     */
    function signingBoxSignAsync(ParamsOfSigningBoxSign $params): AsyncResultOfSigningBoxSign;

    /**
     * @param RegisteredSigningBox $params
     * @return AsyncResult
     */
    function removeSigningBoxAsync(RegisteredSigningBox $params): AsyncResult;

    /**
     * @param callable $callback Transforms app request to app response.
     * @return AsyncRegisteredEncryptionBox
     */
    function registerEncryptionBoxAsync(callable $callback): AsyncRegisteredEncryptionBox;

    /**
     * @param RegisteredEncryptionBox $params
     * @return AsyncResult
     */
    function removeEncryptionBoxAsync(RegisteredEncryptionBox $params): AsyncResult;

    /**
     * @param ParamsOfEncryptionBoxGetInfo $params
     * @return AsyncResultOfEncryptionBoxGetInfo
     */
    function encryptionBoxGetInfoAsync(ParamsOfEncryptionBoxGetInfo $params): AsyncResultOfEncryptionBoxGetInfo;

    /**
     * Block cipher algorithms pad data to cipher block size so encrypted data can be longer then original data. Client should store the original data size after encryption and use it after
     * decryption to retrieve the original data from decrypted data.
     * @param ParamsOfEncryptionBoxEncrypt $params
     * @return AsyncResultOfEncryptionBoxEncrypt
     */
    function encryptionBoxEncryptAsync(ParamsOfEncryptionBoxEncrypt $params): AsyncResultOfEncryptionBoxEncrypt;

    /**
     * Block cipher algorithms pad data to cipher block size so encrypted data can be longer then original data. Client should store the original data size after encryption and use it after
     * decryption to retrieve the original data from decrypted data.
     * @param ParamsOfEncryptionBoxDecrypt $params
     * @return AsyncResultOfEncryptionBoxDecrypt
     */
    function encryptionBoxDecryptAsync(ParamsOfEncryptionBoxDecrypt $params): AsyncResultOfEncryptionBoxDecrypt;

    /**
     * @param ParamsOfCreateEncryptionBox $params
     * @return AsyncRegisteredEncryptionBox
     */
    function createEncryptionBoxAsync(ParamsOfCreateEncryptionBox $params): AsyncRegisteredEncryptionBox;
}
