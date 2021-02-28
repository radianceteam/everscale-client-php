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
use TON\Crypto\ParamsOfNaclSignDetachedVerify;
use TON\Crypto\ParamsOfNaclSignKeyPairFromSecret;
use TON\Crypto\ParamsOfNaclSignOpen;
use TON\Crypto\ParamsOfScrypt;
use TON\Crypto\ParamsOfSign;
use TON\Crypto\ParamsOfSigningBoxSign;
use TON\Crypto\ParamsOfTonCrc16;
use TON\Crypto\ParamsOfVerifySignature;
use TON\Crypto\RegisteredSigningBox;

interface CryptoModuleAsyncInterface
{
    /**
     * @param ParamsOfFactorize $params
     * @return AsyncResultOfFactorize
     */
    function factorizeAsync(ParamsOfFactorize $params): AsyncResultOfFactorize;

    /**
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
     * @param ParamsOfMnemonicVerify $params
     * @return AsyncResultOfMnemonicVerify
     */
    function mnemonicVerifyAsync(ParamsOfMnemonicVerify $params): AsyncResultOfMnemonicVerify;

    /**
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
}
