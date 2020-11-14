<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

/**
 * Crypto functions.
 */
interface CryptoModuleInterface
{
    /**
     * Performs prime factorization – decomposition of a composite number
     *  into a product of smaller prime integers (factors).
     *  See [https://en.wikipedia.org/wiki/Integer_factorization]
     */
    function factorize(ParamsOfFactorize $params): ResultOfFactorize;

    /**
     * Performs modular exponentiation for big integers (`base`^`exponent` mod `modulus`).
     *  See [https://en.wikipedia.org/wiki/Modular_exponentiation]
     */
    function modularPower(ParamsOfModularPower $params): ResultOfModularPower;

    /**
     * Calculates CRC16 using TON algorithm.
     */
    function tonCrc16(ParamsOfTonCrc16 $params): ResultOfTonCrc16;

    /**
     * Generates random byte array of the specified length and returns it in `base64` format
     */
    function generateRandomBytes(ParamsOfGenerateRandomBytes $params): ResultOfGenerateRandomBytes;

    /**
     * Converts public key to ton safe_format
     */
    function convertPublicKeyToTonSafeFormat(ParamsOfConvertPublicKeyToTonSafeFormat $params): ResultOfConvertPublicKeyToTonSafeFormat;

    /**
     * Generates random ed25519 key pair.
     */
    function generateRandomSignKeys(): KeyPair;

    /**
     * Signs a data using the provided keys.
     */
    function sign(ParamsOfSign $params): ResultOfSign;

    /**
     * Verifies signed data using the provided public key.
     *  Raises error if verification is failed.
     */
    function verifySignature(ParamsOfVerifySignature $params): ResultOfVerifySignature;

    /**
     * Calculates SHA256 hash of the specified data.
     */
    function sha256(ParamsOfHash $params): ResultOfHash;

    /**
     * Calculates SHA512 hash of the specified data.
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
     */
    function scrypt(ParamsOfScrypt $params): ResultOfScrypt;

    /**
     * Generates a key pair for signing from the secret key
     */
    function naclSignKeypairFromSecretKey(ParamsOfNaclSignKeyPairFromSecret $params): KeyPair;

    /**
     * Signs data using the signer's secret key.
     */
    function naclSign(ParamsOfNaclSign $params): ResultOfNaclSign;

    function naclSignOpen(ParamsOfNaclSignOpen $params): ResultOfNaclSignOpen;

    function naclSignDetached(ParamsOfNaclSign $params): ResultOfNaclSignDetached;

    function naclBoxKeypair(): KeyPair;

    /**
     * Generates key pair from a secret key
     */
    function naclBoxKeypairFromSecretKey(ParamsOfNaclBoxKeyPairFromSecret $params): KeyPair;

    /**
     * Public key authenticated encryption
     *
     *  Encrypt and authenticate a message using the senders secret key, the recievers public
     *  key, and a nonce.
     */
    function naclBox(ParamsOfNaclBox $params): ResultOfNaclBox;

    /**
     * Decrypt and verify the cipher text using the recievers secret key, the senders public
     *  key, and the nonce.
     */
    function naclBoxOpen(ParamsOfNaclBoxOpen $params): ResultOfNaclBoxOpen;

    /**
     * Encrypt and authenticate message using nonce and secret key.
     */
    function naclSecretBox(ParamsOfNaclSecretBox $params): ResultOfNaclBox;

    /**
     * Decrypts and verifies cipher text using `nonce` and secret `key`.
     */
    function naclSecretBoxOpen(ParamsOfNaclSecretBoxOpen $params): ResultOfNaclBoxOpen;

    /**
     * Prints the list of words from the specified dictionary
     */
    function mnemonicWords(ParamsOfMnemonicWords $params): ResultOfMnemonicWords;

    /**
     * Generates a random mnemonic from the specified dictionary and word count
     */
    function mnemonicFromRandom(ParamsOfMnemonicFromRandom $params): ResultOfMnemonicFromRandom;

    /**
     * Generates mnemonic from pre-generated entropy
     */
    function mnemonicFromEntropy(ParamsOfMnemonicFromEntropy $params): ResultOfMnemonicFromEntropy;

    /**
     * The phrase supplied will be checked for word length and validated according to the checksum
     *  specified in BIP0039.
     */
    function mnemonicVerify(ParamsOfMnemonicVerify $params): ResultOfMnemonicVerify;

    /**
     * Validates the seed phrase, generates master key and then derives
     *  the key pair from the master key and the specified path
     */
    function mnemonicDeriveSignKeys(ParamsOfMnemonicDeriveSignKeys $params): KeyPair;

    /**
     * Generates an extended master private key that will be the root for all the derived keys
     */
    function hdkeyXprvFromMnemonic(ParamsOfHDKeyXPrvFromMnemonic $params): ResultOfHDKeyXPrvFromMnemonic;

    /**
     * Returns extended private key derived from the specified extended private key and child index
     */
    function hdkeyDeriveFromXprv(ParamsOfHDKeyDeriveFromXPrv $params): ResultOfHDKeyDeriveFromXPrv;

    /**
     * Derives the exented private key from the specified key and path
     */
    function hdkeyDeriveFromXprvPath(ParamsOfHDKeyDeriveFromXPrvPath $params): ResultOfHDKeyDeriveFromXPrvPath;

    /**
     * Extracts the private key from the serialized extended private key
     */
    function hdkeySecretFromXprv(ParamsOfHDKeySecretFromXPrv $params): ResultOfHDKeySecretFromXPrv;

    /**
     * Extracts the public key from the serialized extended private key
     */
    function hdkeyPublicFromXprv(ParamsOfHDKeyPublicFromXPrv $params): ResultOfHDKeyPublicFromXPrv;

    /**
     * Performs symmetric `chacha20` encryption.
     */
    function chacha20(ParamsOfChaCha20 $params): ResultOfChaCha20;
}
