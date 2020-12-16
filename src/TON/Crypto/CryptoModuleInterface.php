<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use TON\Crypto\Async\CryptoModuleAsyncInterface;

/**
 * Crypto functions.
 */
interface CryptoModuleInterface
{
    /**
     * @return CryptoModuleAsyncInterface Async version of crypto module interface.
     */
    function async(): CryptoModuleAsyncInterface;

    /**
     * Performs prime factorization – decomposition of a composite number
     *  into a product of smaller prime integers (factors).
     *  See [https://en.wikipedia.org/wiki/Integer_factorization]
     * @param ParamsOfFactorize $params
     * @return ResultOfFactorize
     */
    function factorize(ParamsOfFactorize $params): ResultOfFactorize;

    /**
     * Performs modular exponentiation for big integers (`base`^`exponent` mod `modulus`).
     *  See [https://en.wikipedia.org/wiki/Modular_exponentiation]
     * @param ParamsOfModularPower $params
     * @return ResultOfModularPower
     */
    function modularPower(ParamsOfModularPower $params): ResultOfModularPower;

    /**
     * Calculates CRC16 using TON algorithm.
     * @param ParamsOfTonCrc16 $params
     * @return ResultOfTonCrc16
     */
    function tonCrc16(ParamsOfTonCrc16 $params): ResultOfTonCrc16;

    /**
     * Generates random byte array of the specified length and returns it in `base64` format
     * @param ParamsOfGenerateRandomBytes $params
     * @return ResultOfGenerateRandomBytes
     */
    function generateRandomBytes(ParamsOfGenerateRandomBytes $params): ResultOfGenerateRandomBytes;

    /**
     * Converts public key to ton safe_format
     * @param ParamsOfConvertPublicKeyToTonSafeFormat $params
     * @return ResultOfConvertPublicKeyToTonSafeFormat
     */
    function convertPublicKeyToTonSafeFormat(ParamsOfConvertPublicKeyToTonSafeFormat $params): ResultOfConvertPublicKeyToTonSafeFormat;

    /**
     * Generates random ed25519 key pair.
     * @return KeyPair
     */
    function generateRandomSignKeys(): KeyPair;

    /**
     * Signs a data using the provided keys.
     * @param ParamsOfSign $params
     * @return ResultOfSign
     */
    function sign(ParamsOfSign $params): ResultOfSign;

    /**
     * Verifies signed data using the provided public key.
     *  Raises error if verification is failed.
     * @param ParamsOfVerifySignature $params
     * @return ResultOfVerifySignature
     */
    function verifySignature(ParamsOfVerifySignature $params): ResultOfVerifySignature;

    /**
     * Calculates SHA256 hash of the specified data.
     * @param ParamsOfHash $params
     * @return ResultOfHash
     */
    function sha256(ParamsOfHash $params): ResultOfHash;

    /**
     * Calculates SHA512 hash of the specified data.
     * @param ParamsOfHash $params
     * @return ResultOfHash
     */
    function sha512(ParamsOfHash $params): ResultOfHash;

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
     * @return ResultOfScrypt
     */
    function scrypt(ParamsOfScrypt $params): ResultOfScrypt;

    /**
     * Generates a key pair for signing from the secret key
     * @param ParamsOfNaclSignKeyPairFromSecret $params
     * @return KeyPair
     */
    function naclSignKeypairFromSecretKey(ParamsOfNaclSignKeyPairFromSecret $params): KeyPair;

    /**
     * Signs data using the signer's secret key.
     * @param ParamsOfNaclSign $params
     * @return ResultOfNaclSign
     */
    function naclSign(ParamsOfNaclSign $params): ResultOfNaclSign;

    /**
     * @param ParamsOfNaclSignOpen $params
     * @return ResultOfNaclSignOpen
     */
    function naclSignOpen(ParamsOfNaclSignOpen $params): ResultOfNaclSignOpen;

    /**
     * @param ParamsOfNaclSign $params
     * @return ResultOfNaclSignDetached
     */
    function naclSignDetached(ParamsOfNaclSign $params): ResultOfNaclSignDetached;

    /**
     * @return KeyPair
     */
    function naclBoxKeypair(): KeyPair;

    /**
     * Generates key pair from a secret key
     * @param ParamsOfNaclBoxKeyPairFromSecret $params
     * @return KeyPair
     */
    function naclBoxKeypairFromSecretKey(ParamsOfNaclBoxKeyPairFromSecret $params): KeyPair;

    /**
     * Public key authenticated encryption
     *
     *  Encrypt and authenticate a message using the senders secret key, the recievers public
     *  key, and a nonce.
     * @param ParamsOfNaclBox $params
     * @return ResultOfNaclBox
     */
    function naclBox(ParamsOfNaclBox $params): ResultOfNaclBox;

    /**
     * Decrypt and verify the cipher text using the recievers secret key, the senders public
     *  key, and the nonce.
     * @param ParamsOfNaclBoxOpen $params
     * @return ResultOfNaclBoxOpen
     */
    function naclBoxOpen(ParamsOfNaclBoxOpen $params): ResultOfNaclBoxOpen;

    /**
     * Encrypt and authenticate message using nonce and secret key.
     * @param ParamsOfNaclSecretBox $params
     * @return ResultOfNaclBox
     */
    function naclSecretBox(ParamsOfNaclSecretBox $params): ResultOfNaclBox;

    /**
     * Decrypts and verifies cipher text using `nonce` and secret `key`.
     * @param ParamsOfNaclSecretBoxOpen $params
     * @return ResultOfNaclBoxOpen
     */
    function naclSecretBoxOpen(ParamsOfNaclSecretBoxOpen $params): ResultOfNaclBoxOpen;

    /**
     * Prints the list of words from the specified dictionary
     * @param ParamsOfMnemonicWords $params
     * @return ResultOfMnemonicWords
     */
    function mnemonicWords(ParamsOfMnemonicWords $params): ResultOfMnemonicWords;

    /**
     * Generates a random mnemonic from the specified dictionary and word count
     * @param ParamsOfMnemonicFromRandom $params
     * @return ResultOfMnemonicFromRandom
     */
    function mnemonicFromRandom(ParamsOfMnemonicFromRandom $params): ResultOfMnemonicFromRandom;

    /**
     * Generates mnemonic from pre-generated entropy
     * @param ParamsOfMnemonicFromEntropy $params
     * @return ResultOfMnemonicFromEntropy
     */
    function mnemonicFromEntropy(ParamsOfMnemonicFromEntropy $params): ResultOfMnemonicFromEntropy;

    /**
     * The phrase supplied will be checked for word length and validated according to the checksum
     *  specified in BIP0039.
     * @param ParamsOfMnemonicVerify $params
     * @return ResultOfMnemonicVerify
     */
    function mnemonicVerify(ParamsOfMnemonicVerify $params): ResultOfMnemonicVerify;

    /**
     * Validates the seed phrase, generates master key and then derives
     *  the key pair from the master key and the specified path
     * @param ParamsOfMnemonicDeriveSignKeys $params
     * @return KeyPair
     */
    function mnemonicDeriveSignKeys(ParamsOfMnemonicDeriveSignKeys $params): KeyPair;

    /**
     * Generates an extended master private key that will be the root for all the derived keys
     * @param ParamsOfHDKeyXPrvFromMnemonic $params
     * @return ResultOfHDKeyXPrvFromMnemonic
     */
    function hdkeyXprvFromMnemonic(ParamsOfHDKeyXPrvFromMnemonic $params): ResultOfHDKeyXPrvFromMnemonic;

    /**
     * Returns extended private key derived from the specified extended private key and child index
     * @param ParamsOfHDKeyDeriveFromXPrv $params
     * @return ResultOfHDKeyDeriveFromXPrv
     */
    function hdkeyDeriveFromXprv(ParamsOfHDKeyDeriveFromXPrv $params): ResultOfHDKeyDeriveFromXPrv;

    /**
     * Derives the extended private key from the specified key and path
     * @param ParamsOfHDKeyDeriveFromXPrvPath $params
     * @return ResultOfHDKeyDeriveFromXPrvPath
     */
    function hdkeyDeriveFromXprvPath(ParamsOfHDKeyDeriveFromXPrvPath $params): ResultOfHDKeyDeriveFromXPrvPath;

    /**
     * Extracts the private key from the serialized extended private key
     * @param ParamsOfHDKeySecretFromXPrv $params
     * @return ResultOfHDKeySecretFromXPrv
     */
    function hdkeySecretFromXprv(ParamsOfHDKeySecretFromXPrv $params): ResultOfHDKeySecretFromXPrv;

    /**
     * Extracts the public key from the serialized extended private key
     * @param ParamsOfHDKeyPublicFromXPrv $params
     * @return ResultOfHDKeyPublicFromXPrv
     */
    function hdkeyPublicFromXprv(ParamsOfHDKeyPublicFromXPrv $params): ResultOfHDKeyPublicFromXPrv;

    /**
     * Performs symmetric `chacha20` encryption.
     * @param ParamsOfChaCha20 $params
     * @return ResultOfChaCha20
     */
    function chacha20(ParamsOfChaCha20 $params): ResultOfChaCha20;

    /**
     * Creates a default signing box implementation.
     * @param KeyPair $params
     * @return RegisteredSigningBox
     */
    function getSigningBox(KeyPair $params): RegisteredSigningBox;

    /**
     * Returns public key of signing key pair.
     * @param RegisteredSigningBox $params
     * @return ResultOfSigningBoxGetPublicKey
     */
    function signingBoxGetPublicKey(RegisteredSigningBox $params): ResultOfSigningBoxGetPublicKey;

    /**
     * Returns signed user data.
     * @param ParamsOfSigningBoxSign $params
     * @return ResultOfSigningBoxSign
     */
    function signingBoxSign(ParamsOfSigningBoxSign $params): ResultOfSigningBoxSign;

    /**
     * Removes signing box from SDK.
     * @param RegisteredSigningBox $params
     */
    function removeSigningBox(RegisteredSigningBox $params);
}
