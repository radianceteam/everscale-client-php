<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use TON\Crypto\Async\CryptoModuleAsyncInterface;

interface CryptoModuleInterface
{
    /**
     * @return CryptoModuleAsyncInterface Async version of crypto module interface.
     */
    function async(): CryptoModuleAsyncInterface;

    /**
     * @param ParamsOfFactorize $params
     * @return ResultOfFactorize
     */
    function factorize(ParamsOfFactorize $params): ResultOfFactorize;

    /**
     * @param ParamsOfModularPower $params
     * @return ResultOfModularPower
     */
    function modularPower(ParamsOfModularPower $params): ResultOfModularPower;

    /**
     * @param ParamsOfTonCrc16 $params
     * @return ResultOfTonCrc16
     */
    function tonCrc16(ParamsOfTonCrc16 $params): ResultOfTonCrc16;

    /**
     * @param ParamsOfGenerateRandomBytes $params
     * @return ResultOfGenerateRandomBytes
     */
    function generateRandomBytes(ParamsOfGenerateRandomBytes $params): ResultOfGenerateRandomBytes;

    /**
     * @param ParamsOfConvertPublicKeyToTonSafeFormat $params
     * @return ResultOfConvertPublicKeyToTonSafeFormat
     */
    function convertPublicKeyToTonSafeFormat(ParamsOfConvertPublicKeyToTonSafeFormat $params): ResultOfConvertPublicKeyToTonSafeFormat;

    /**
     * @return KeyPair
     */
    function generateRandomSignKeys(): KeyPair;

    /**
     * @param ParamsOfSign $params
     * @return ResultOfSign
     */
    function sign(ParamsOfSign $params): ResultOfSign;

    /**
     * @param ParamsOfVerifySignature $params
     * @return ResultOfVerifySignature
     */
    function verifySignature(ParamsOfVerifySignature $params): ResultOfVerifySignature;

    /**
     * @param ParamsOfHash $params
     * @return ResultOfHash
     */
    function sha256(ParamsOfHash $params): ResultOfHash;

    /**
     * @param ParamsOfHash $params
     * @return ResultOfHash
     */
    function sha512(ParamsOfHash $params): ResultOfHash;

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
     * @return ResultOfScrypt
     */
    function scrypt(ParamsOfScrypt $params): ResultOfScrypt;

    /**
     * @param ParamsOfNaclSignKeyPairFromSecret $params
     * @return KeyPair
     */
    function naclSignKeypairFromSecretKey(ParamsOfNaclSignKeyPairFromSecret $params): KeyPair;

    /**
     * @param ParamsOfNaclSign $params
     * @return ResultOfNaclSign
     */
    function naclSign(ParamsOfNaclSign $params): ResultOfNaclSign;

    /**
     * Verifies the signature in `signed` using the signer's public key `public`
     * and returns the message `unsigned`.
     *
     * If the signature fails verification, crypto_sign_open raises an exception.
     * @param ParamsOfNaclSignOpen $params
     * @return ResultOfNaclSignOpen
     */
    function naclSignOpen(ParamsOfNaclSignOpen $params): ResultOfNaclSignOpen;

    /**
     * Signs the message `unsigned` using the secret key `secret`
     * and returns a signature `signature`.
     * @param ParamsOfNaclSign $params
     * @return ResultOfNaclSignDetached
     */
    function naclSignDetached(ParamsOfNaclSign $params): ResultOfNaclSignDetached;

    /**
     * @param ParamsOfNaclSignDetachedVerify $params
     * @return ResultOfNaclSignDetachedVerify
     */
    function naclSignDetachedVerify(ParamsOfNaclSignDetachedVerify $params): ResultOfNaclSignDetachedVerify;

    /**
     * @return KeyPair
     */
    function naclBoxKeypair(): KeyPair;

    /**
     * @param ParamsOfNaclBoxKeyPairFromSecret $params
     * @return KeyPair
     */
    function naclBoxKeypairFromSecretKey(ParamsOfNaclBoxKeyPairFromSecret $params): KeyPair;

    /**
     * Encrypt and authenticate a message using the senders secret key, the receivers public
     * key, and a nonce.
     * @param ParamsOfNaclBox $params
     * @return ResultOfNaclBox
     */
    function naclBox(ParamsOfNaclBox $params): ResultOfNaclBox;

    /**
     * @param ParamsOfNaclBoxOpen $params
     * @return ResultOfNaclBoxOpen
     */
    function naclBoxOpen(ParamsOfNaclBoxOpen $params): ResultOfNaclBoxOpen;

    /**
     * @param ParamsOfNaclSecretBox $params
     * @return ResultOfNaclBox
     */
    function naclSecretBox(ParamsOfNaclSecretBox $params): ResultOfNaclBox;

    /**
     * @param ParamsOfNaclSecretBoxOpen $params
     * @return ResultOfNaclBoxOpen
     */
    function naclSecretBoxOpen(ParamsOfNaclSecretBoxOpen $params): ResultOfNaclBoxOpen;

    /**
     * @param ParamsOfMnemonicWords $params
     * @return ResultOfMnemonicWords
     */
    function mnemonicWords(ParamsOfMnemonicWords $params): ResultOfMnemonicWords;

    /**
     * @param ParamsOfMnemonicFromRandom $params
     * @return ResultOfMnemonicFromRandom
     */
    function mnemonicFromRandom(ParamsOfMnemonicFromRandom $params): ResultOfMnemonicFromRandom;

    /**
     * @param ParamsOfMnemonicFromEntropy $params
     * @return ResultOfMnemonicFromEntropy
     */
    function mnemonicFromEntropy(ParamsOfMnemonicFromEntropy $params): ResultOfMnemonicFromEntropy;

    /**
     * @param ParamsOfMnemonicVerify $params
     * @return ResultOfMnemonicVerify
     */
    function mnemonicVerify(ParamsOfMnemonicVerify $params): ResultOfMnemonicVerify;

    /**
     * @param ParamsOfMnemonicDeriveSignKeys $params
     * @return KeyPair
     */
    function mnemonicDeriveSignKeys(ParamsOfMnemonicDeriveSignKeys $params): KeyPair;

    /**
     * @param ParamsOfHDKeyXPrvFromMnemonic $params
     * @return ResultOfHDKeyXPrvFromMnemonic
     */
    function hdkeyXprvFromMnemonic(ParamsOfHDKeyXPrvFromMnemonic $params): ResultOfHDKeyXPrvFromMnemonic;

    /**
     * @param ParamsOfHDKeyDeriveFromXPrv $params
     * @return ResultOfHDKeyDeriveFromXPrv
     */
    function hdkeyDeriveFromXprv(ParamsOfHDKeyDeriveFromXPrv $params): ResultOfHDKeyDeriveFromXPrv;

    /**
     * @param ParamsOfHDKeyDeriveFromXPrvPath $params
     * @return ResultOfHDKeyDeriveFromXPrvPath
     */
    function hdkeyDeriveFromXprvPath(ParamsOfHDKeyDeriveFromXPrvPath $params): ResultOfHDKeyDeriveFromXPrvPath;

    /**
     * @param ParamsOfHDKeySecretFromXPrv $params
     * @return ResultOfHDKeySecretFromXPrv
     */
    function hdkeySecretFromXprv(ParamsOfHDKeySecretFromXPrv $params): ResultOfHDKeySecretFromXPrv;

    /**
     * @param ParamsOfHDKeyPublicFromXPrv $params
     * @return ResultOfHDKeyPublicFromXPrv
     */
    function hdkeyPublicFromXprv(ParamsOfHDKeyPublicFromXPrv $params): ResultOfHDKeyPublicFromXPrv;

    /**
     * @param ParamsOfChaCha20 $params
     * @return ResultOfChaCha20
     */
    function chacha20(ParamsOfChaCha20 $params): ResultOfChaCha20;

    /**
     * @param KeyPair $params
     * @return RegisteredSigningBox
     */
    function getSigningBox(KeyPair $params): RegisteredSigningBox;

    /**
     * @param RegisteredSigningBox $params
     * @return ResultOfSigningBoxGetPublicKey
     */
    function signingBoxGetPublicKey(RegisteredSigningBox $params): ResultOfSigningBoxGetPublicKey;

    /**
     * @param ParamsOfSigningBoxSign $params
     * @return ResultOfSigningBoxSign
     */
    function signingBoxSign(ParamsOfSigningBoxSign $params): ResultOfSigningBoxSign;

    /**
     * @param RegisteredSigningBox $params
     */
    function removeSigningBox(RegisteredSigningBox $params);
}
