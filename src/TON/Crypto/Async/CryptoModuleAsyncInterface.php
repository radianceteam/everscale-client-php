<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto\Async;

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
use TON\Crypto\ParamsOfTonCrc16;
use TON\Crypto\ParamsOfVerifySignature;

/**
 * Crypto functions.
 */
interface CryptoModuleAsyncInterface
{
    /**
     * Performs prime factorization – decomposition of a composite number
     *  into a product of smaller prime integers (factors).
     *  See [https://en.wikipedia.org/wiki/Integer_factorization]
     */
    function factorizeAsync(ParamsOfFactorize $params): AsyncResultOfFactorize;

    /**
     * Performs modular exponentiation for big integers (`base`^`exponent` mod `modulus`).
     *  See [https://en.wikipedia.org/wiki/Modular_exponentiation]
     */
    function modularPowerAsync(ParamsOfModularPower $params): AsyncResultOfModularPower;

    /**
     * Calculates CRC16 using TON algorithm.
     */
    function tonCrc16Async(ParamsOfTonCrc16 $params): AsyncResultOfTonCrc16;

    /**
     * Generates random byte array of the specified length and returns it in `base64` format
     */
    function generateRandomBytesAsync(ParamsOfGenerateRandomBytes $params): AsyncResultOfGenerateRandomBytes;

    /**
     * Converts public key to ton safe_format
     */
    function convertPublicKeyToTonSafeFormatAsync(ParamsOfConvertPublicKeyToTonSafeFormat $params): AsyncResultOfConvertPublicKeyToTonSafeFormat;

    /**
     * Generates random ed25519 key pair.
     */
    function generateRandomSignKeysAsync(): AsyncKeyPair;

    /**
     * Signs a data using the provided keys.
     */
    function signAsync(ParamsOfSign $params): AsyncResultOfSign;

    /**
     * Verifies signed data using the provided public key.
     *  Raises error if verification is failed.
     */
    function verifySignatureAsync(ParamsOfVerifySignature $params): AsyncResultOfVerifySignature;

    /**
     * Calculates SHA256 hash of the specified data.
     */
    function sha256Async(ParamsOfHash $params): AsyncResultOfHash;

    /**
     * Calculates SHA512 hash of the specified data.
     */
    function sha512Async(ParamsOfHash $params): AsyncResultOfHash;

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
    function scryptAsync(ParamsOfScrypt $params): AsyncResultOfScrypt;

    /**
     * Generates a key pair for signing from the secret key
     */
    function naclSignKeypairFromSecretKeyAsync(ParamsOfNaclSignKeyPairFromSecret $params): AsyncKeyPair;

    /**
     * Signs data using the signer's secret key.
     */
    function naclSignAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSign;

    function naclSignOpenAsync(ParamsOfNaclSignOpen $params): AsyncResultOfNaclSignOpen;

    function naclSignDetachedAsync(ParamsOfNaclSign $params): AsyncResultOfNaclSignDetached;

    function naclBoxKeypairAsync(): AsyncKeyPair;

    /**
     * Generates key pair from a secret key
     */
    function naclBoxKeypairFromSecretKeyAsync(ParamsOfNaclBoxKeyPairFromSecret $params): AsyncKeyPair;

    /**
     * Public key authenticated encryption
     *
     *  Encrypt and authenticate a message using the senders secret key, the recievers public
     *  key, and a nonce.
     */
    function naclBoxAsync(ParamsOfNaclBox $params): AsyncResultOfNaclBox;

    /**
     * Decrypt and verify the cipher text using the recievers secret key, the senders public
     *  key, and the nonce.
     */
    function naclBoxOpenAsync(ParamsOfNaclBoxOpen $params): AsyncResultOfNaclBoxOpen;

    /**
     * Encrypt and authenticate message using nonce and secret key.
     */
    function naclSecretBoxAsync(ParamsOfNaclSecretBox $params): AsyncResultOfNaclBox;

    /**
     * Decrypts and verifies cipher text using `nonce` and secret `key`.
     */
    function naclSecretBoxOpenAsync(ParamsOfNaclSecretBoxOpen $params): AsyncResultOfNaclBoxOpen;

    /**
     * Prints the list of words from the specified dictionary
     */
    function mnemonicWordsAsync(ParamsOfMnemonicWords $params): AsyncResultOfMnemonicWords;

    /**
     * Generates a random mnemonic from the specified dictionary and word count
     */
    function mnemonicFromRandomAsync(ParamsOfMnemonicFromRandom $params): AsyncResultOfMnemonicFromRandom;

    /**
     * Generates mnemonic from pre-generated entropy
     */
    function mnemonicFromEntropyAsync(ParamsOfMnemonicFromEntropy $params): AsyncResultOfMnemonicFromEntropy;

    /**
     * The phrase supplied will be checked for word length and validated according to the checksum
     *  specified in BIP0039.
     */
    function mnemonicVerifyAsync(ParamsOfMnemonicVerify $params): AsyncResultOfMnemonicVerify;

    /**
     * Validates the seed phrase, generates master key and then derives
     *  the key pair from the master key and the specified path
     */
    function mnemonicDeriveSignKeysAsync(ParamsOfMnemonicDeriveSignKeys $params): AsyncKeyPair;

    /**
     * Generates an extended master private key that will be the root for all the derived keys
     */
    function hdkeyXprvFromMnemonicAsync(ParamsOfHDKeyXPrvFromMnemonic $params): AsyncResultOfHDKeyXPrvFromMnemonic;

    /**
     * Returns extended private key derived from the specified extended private key and child index
     */
    function hdkeyDeriveFromXprvAsync(ParamsOfHDKeyDeriveFromXPrv $params): AsyncResultOfHDKeyDeriveFromXPrv;

    /**
     * Derives the exented private key from the specified key and path
     */
    function hdkeyDeriveFromXprvPathAsync(ParamsOfHDKeyDeriveFromXPrvPath $params): AsyncResultOfHDKeyDeriveFromXPrvPath;

    /**
     * Extracts the private key from the serialized extended private key
     */
    function hdkeySecretFromXprvAsync(ParamsOfHDKeySecretFromXPrv $params): AsyncResultOfHDKeySecretFromXPrv;

    /**
     * Extracts the public key from the serialized extended private key
     */
    function hdkeyPublicFromXprvAsync(ParamsOfHDKeyPublicFromXPrv $params): AsyncResultOfHDKeyPublicFromXPrv;

    /**
     * Performs symmetric `chacha20` encryption.
     */
    function chacha20Async(ParamsOfChaCha20 $params): AsyncResultOfChaCha20;
}
