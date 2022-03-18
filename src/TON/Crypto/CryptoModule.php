<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use TON\Crypto\Async\AsyncCryptoModule;
use TON\Crypto\Async\CryptoModuleAsyncInterface;
use TON\TonContext;

class CryptoModule implements CryptoModuleInterface
{
    private TonContext $_context;

    /**
     * CryptoModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return CryptoModuleAsyncInterface Async version of crypto module interface.
     */
    public function async(): CryptoModuleAsyncInterface
    {
        return new AsyncCryptoModule($this->_context);
    }

    /**
     * Performs prime factorization – decomposition of a composite number
     * into a product of smaller prime integers (factors).
     * See [https://en.wikipedia.org/wiki/Integer_factorization]
     * @param ParamsOfFactorize $params
     * @return ResultOfFactorize
     */
    public function factorize(ParamsOfFactorize $params): ResultOfFactorize
    {
        return new ResultOfFactorize($this->_context->callFunction('crypto.factorize', $params));
    }

    /**
     * Performs modular exponentiation for big integers (`base`^`exponent` mod `modulus`).
     * See [https://en.wikipedia.org/wiki/Modular_exponentiation]
     * @param ParamsOfModularPower $params
     * @return ResultOfModularPower
     */
    public function modularPower(ParamsOfModularPower $params): ResultOfModularPower
    {
        return new ResultOfModularPower($this->_context->callFunction('crypto.modular_power', $params));
    }

    /**
     * @param ParamsOfTonCrc16 $params
     * @return ResultOfTonCrc16
     */
    public function tonCrc16(ParamsOfTonCrc16 $params): ResultOfTonCrc16
    {
        return new ResultOfTonCrc16($this->_context->callFunction('crypto.ton_crc16', $params));
    }

    /**
     * @param ParamsOfGenerateRandomBytes $params
     * @return ResultOfGenerateRandomBytes
     */
    public function generateRandomBytes(ParamsOfGenerateRandomBytes $params): ResultOfGenerateRandomBytes
    {
        return new ResultOfGenerateRandomBytes($this->_context->callFunction('crypto.generate_random_bytes', $params));
    }

    /**
     * @param ParamsOfConvertPublicKeyToTonSafeFormat $params
     * @return ResultOfConvertPublicKeyToTonSafeFormat
     */
    public function convertPublicKeyToTonSafeFormat(ParamsOfConvertPublicKeyToTonSafeFormat $params): ResultOfConvertPublicKeyToTonSafeFormat
    {
        return new ResultOfConvertPublicKeyToTonSafeFormat($this->_context->callFunction('crypto.convert_public_key_to_ton_safe_format', $params));
    }

    /**
     * @return KeyPair
     */
    public function generateRandomSignKeys(): KeyPair
    {
        return new KeyPair($this->_context->callFunction('crypto.generate_random_sign_keys'));
    }

    /**
     * @param ParamsOfSign $params
     * @return ResultOfSign
     */
    public function sign(ParamsOfSign $params): ResultOfSign
    {
        return new ResultOfSign($this->_context->callFunction('crypto.sign', $params));
    }

    /**
     * @param ParamsOfVerifySignature $params
     * @return ResultOfVerifySignature
     */
    public function verifySignature(ParamsOfVerifySignature $params): ResultOfVerifySignature
    {
        return new ResultOfVerifySignature($this->_context->callFunction('crypto.verify_signature', $params));
    }

    /**
     * @param ParamsOfHash $params
     * @return ResultOfHash
     */
    public function sha256(ParamsOfHash $params): ResultOfHash
    {
        return new ResultOfHash($this->_context->callFunction('crypto.sha256', $params));
    }

    /**
     * @param ParamsOfHash $params
     * @return ResultOfHash
     */
    public function sha512(ParamsOfHash $params): ResultOfHash
    {
        return new ResultOfHash($this->_context->callFunction('crypto.sha512', $params));
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
     * @return ResultOfScrypt
     */
    public function scrypt(ParamsOfScrypt $params): ResultOfScrypt
    {
        return new ResultOfScrypt($this->_context->callFunction('crypto.scrypt', $params));
    }

    /**
     * **NOTE:** In the result the secret key is actually the concatenation
     * of secret and public keys (128 symbols hex string) by design of [NaCL](http://nacl.cr.yp.to/sign.html).
     * See also [the stackexchange question](https://crypto.stackexchange.com/questions/54353/).
     * @param ParamsOfNaclSignKeyPairFromSecret $params
     * @return KeyPair
     */
    public function naclSignKeypairFromSecretKey(ParamsOfNaclSignKeyPairFromSecret $params): KeyPair
    {
        return new KeyPair($this->_context->callFunction('crypto.nacl_sign_keypair_from_secret_key', $params));
    }

    /**
     * @param ParamsOfNaclSign $params
     * @return ResultOfNaclSign
     */
    public function naclSign(ParamsOfNaclSign $params): ResultOfNaclSign
    {
        return new ResultOfNaclSign($this->_context->callFunction('crypto.nacl_sign', $params));
    }

    /**
     * Verifies the signature in `signed` using the signer's public key `public`
     * and returns the message `unsigned`.
     *
     * If the signature fails verification, crypto_sign_open raises an exception.
     * @param ParamsOfNaclSignOpen $params
     * @return ResultOfNaclSignOpen
     */
    public function naclSignOpen(ParamsOfNaclSignOpen $params): ResultOfNaclSignOpen
    {
        return new ResultOfNaclSignOpen($this->_context->callFunction('crypto.nacl_sign_open', $params));
    }

    /**
     * Signs the message `unsigned` using the secret key `secret`
     * and returns a signature `signature`.
     * @param ParamsOfNaclSign $params
     * @return ResultOfNaclSignDetached
     */
    public function naclSignDetached(ParamsOfNaclSign $params): ResultOfNaclSignDetached
    {
        return new ResultOfNaclSignDetached($this->_context->callFunction('crypto.nacl_sign_detached', $params));
    }

    /**
     * @param ParamsOfNaclSignDetachedVerify $params
     * @return ResultOfNaclSignDetachedVerify
     */
    public function naclSignDetachedVerify(ParamsOfNaclSignDetachedVerify $params): ResultOfNaclSignDetachedVerify
    {
        return new ResultOfNaclSignDetachedVerify($this->_context->callFunction('crypto.nacl_sign_detached_verify', $params));
    }

    /**
     * @return KeyPair
     */
    public function naclBoxKeypair(): KeyPair
    {
        return new KeyPair($this->_context->callFunction('crypto.nacl_box_keypair'));
    }

    /**
     * @param ParamsOfNaclBoxKeyPairFromSecret $params
     * @return KeyPair
     */
    public function naclBoxKeypairFromSecretKey(ParamsOfNaclBoxKeyPairFromSecret $params): KeyPair
    {
        return new KeyPair($this->_context->callFunction('crypto.nacl_box_keypair_from_secret_key', $params));
    }

    /**
     * Encrypt and authenticate a message using the senders secret key, the receivers public
     * key, and a nonce.
     * @param ParamsOfNaclBox $params
     * @return ResultOfNaclBox
     */
    public function naclBox(ParamsOfNaclBox $params): ResultOfNaclBox
    {
        return new ResultOfNaclBox($this->_context->callFunction('crypto.nacl_box', $params));
    }

    /**
     * @param ParamsOfNaclBoxOpen $params
     * @return ResultOfNaclBoxOpen
     */
    public function naclBoxOpen(ParamsOfNaclBoxOpen $params): ResultOfNaclBoxOpen
    {
        return new ResultOfNaclBoxOpen($this->_context->callFunction('crypto.nacl_box_open', $params));
    }

    /**
     * @param ParamsOfNaclSecretBox $params
     * @return ResultOfNaclBox
     */
    public function naclSecretBox(ParamsOfNaclSecretBox $params): ResultOfNaclBox
    {
        return new ResultOfNaclBox($this->_context->callFunction('crypto.nacl_secret_box', $params));
    }

    /**
     * @param ParamsOfNaclSecretBoxOpen $params
     * @return ResultOfNaclBoxOpen
     */
    public function naclSecretBoxOpen(ParamsOfNaclSecretBoxOpen $params): ResultOfNaclBoxOpen
    {
        return new ResultOfNaclBoxOpen($this->_context->callFunction('crypto.nacl_secret_box_open', $params));
    }

    /**
     * @param ParamsOfMnemonicWords $params
     * @return ResultOfMnemonicWords
     */
    public function mnemonicWords(ParamsOfMnemonicWords $params): ResultOfMnemonicWords
    {
        return new ResultOfMnemonicWords($this->_context->callFunction('crypto.mnemonic_words', $params));
    }

    /**
     * Generates a random mnemonic from the specified dictionary and word count
     * @param ParamsOfMnemonicFromRandom $params
     * @return ResultOfMnemonicFromRandom
     */
    public function mnemonicFromRandom(ParamsOfMnemonicFromRandom $params): ResultOfMnemonicFromRandom
    {
        return new ResultOfMnemonicFromRandom($this->_context->callFunction('crypto.mnemonic_from_random', $params));
    }

    /**
     * @param ParamsOfMnemonicFromEntropy $params
     * @return ResultOfMnemonicFromEntropy
     */
    public function mnemonicFromEntropy(ParamsOfMnemonicFromEntropy $params): ResultOfMnemonicFromEntropy
    {
        return new ResultOfMnemonicFromEntropy($this->_context->callFunction('crypto.mnemonic_from_entropy', $params));
    }

    /**
     * The phrase supplied will be checked for word length and validated according to the checksum
     * specified in BIP0039.
     * @param ParamsOfMnemonicVerify $params
     * @return ResultOfMnemonicVerify
     */
    public function mnemonicVerify(ParamsOfMnemonicVerify $params): ResultOfMnemonicVerify
    {
        return new ResultOfMnemonicVerify($this->_context->callFunction('crypto.mnemonic_verify', $params));
    }

    /**
     * Validates the seed phrase, generates master key and then derives
     * the key pair from the master key and the specified path
     * @param ParamsOfMnemonicDeriveSignKeys $params
     * @return KeyPair
     */
    public function mnemonicDeriveSignKeys(ParamsOfMnemonicDeriveSignKeys $params): KeyPair
    {
        return new KeyPair($this->_context->callFunction('crypto.mnemonic_derive_sign_keys', $params));
    }

    /**
     * @param ParamsOfHDKeyXPrvFromMnemonic $params
     * @return ResultOfHDKeyXPrvFromMnemonic
     */
    public function hdkeyXprvFromMnemonic(ParamsOfHDKeyXPrvFromMnemonic $params): ResultOfHDKeyXPrvFromMnemonic
    {
        return new ResultOfHDKeyXPrvFromMnemonic($this->_context->callFunction('crypto.hdkey_xprv_from_mnemonic', $params));
    }

    /**
     * @param ParamsOfHDKeyDeriveFromXPrv $params
     * @return ResultOfHDKeyDeriveFromXPrv
     */
    public function hdkeyDeriveFromXprv(ParamsOfHDKeyDeriveFromXPrv $params): ResultOfHDKeyDeriveFromXPrv
    {
        return new ResultOfHDKeyDeriveFromXPrv($this->_context->callFunction('crypto.hdkey_derive_from_xprv', $params));
    }

    /**
     * @param ParamsOfHDKeyDeriveFromXPrvPath $params
     * @return ResultOfHDKeyDeriveFromXPrvPath
     */
    public function hdkeyDeriveFromXprvPath(ParamsOfHDKeyDeriveFromXPrvPath $params): ResultOfHDKeyDeriveFromXPrvPath
    {
        return new ResultOfHDKeyDeriveFromXPrvPath($this->_context->callFunction('crypto.hdkey_derive_from_xprv_path', $params));
    }

    /**
     * @param ParamsOfHDKeySecretFromXPrv $params
     * @return ResultOfHDKeySecretFromXPrv
     */
    public function hdkeySecretFromXprv(ParamsOfHDKeySecretFromXPrv $params): ResultOfHDKeySecretFromXPrv
    {
        return new ResultOfHDKeySecretFromXPrv($this->_context->callFunction('crypto.hdkey_secret_from_xprv', $params));
    }

    /**
     * @param ParamsOfHDKeyPublicFromXPrv $params
     * @return ResultOfHDKeyPublicFromXPrv
     */
    public function hdkeyPublicFromXprv(ParamsOfHDKeyPublicFromXPrv $params): ResultOfHDKeyPublicFromXPrv
    {
        return new ResultOfHDKeyPublicFromXPrv($this->_context->callFunction('crypto.hdkey_public_from_xprv', $params));
    }

    /**
     * @param ParamsOfChaCha20 $params
     * @return ResultOfChaCha20
     */
    public function chacha20(ParamsOfChaCha20 $params): ResultOfChaCha20
    {
        return new ResultOfChaCha20($this->_context->callFunction('crypto.chacha20', $params));
    }

    /**
     * @param RegisteredCryptoBox $params
     */
    public function removeCryptoBox(RegisteredCryptoBox $params)
    {
        $this->_context->callFunction('crypto.remove_crypto_box', $params);
    }

    /**
     * @param RegisteredCryptoBox $params
     * @return ResultOfGetCryptoBoxInfo
     */
    public function getCryptoBoxInfo(RegisteredCryptoBox $params): ResultOfGetCryptoBoxInfo
    {
        return new ResultOfGetCryptoBoxInfo($this->_context->callFunction('crypto.get_crypto_box_info', $params));
    }

    /**
     * Attention! Store this data in your application for a very short period of time and overwrite it with zeroes ASAP.
     * @param RegisteredCryptoBox $params
     * @return ResultOfGetCryptoBoxSeedPhrase
     */
    public function getCryptoBoxSeedPhrase(RegisteredCryptoBox $params): ResultOfGetCryptoBoxSeedPhrase
    {
        return new ResultOfGetCryptoBoxSeedPhrase($this->_context->callFunction('crypto.get_crypto_box_seed_phrase', $params));
    }

    /**
     * @param ParamsOfGetSigningBoxFromCryptoBox $params
     * @return RegisteredSigningBox
     */
    public function getSigningBoxFromCryptoBox(ParamsOfGetSigningBoxFromCryptoBox $params): RegisteredSigningBox
    {
        return new RegisteredSigningBox($this->_context->callFunction('crypto.get_signing_box_from_crypto_box', $params));
    }

    /**
     * Derives encryption keypair from cryptobox secret and hdpath and
     * stores it in cache for `secret_lifetime`
     * or until explicitly cleared by `clear_crypto_box_secret_cache` method.
     * If `secret_lifetime` is not specified - overwrites encryption secret with zeroes immediately after
     * encryption operation.
     * @param ParamsOfGetEncryptionBoxFromCryptoBox $params
     * @return RegisteredEncryptionBox
     */
    public function getEncryptionBoxFromCryptoBox(ParamsOfGetEncryptionBoxFromCryptoBox $params): RegisteredEncryptionBox
    {
        return new RegisteredEncryptionBox($this->_context->callFunction('crypto.get_encryption_box_from_crypto_box', $params));
    }

    /**
     * @param RegisteredCryptoBox $params
     */
    public function clearCryptoBoxSecretCache(RegisteredCryptoBox $params)
    {
        $this->_context->callFunction('crypto.clear_crypto_box_secret_cache', $params);
    }

    /**
     * @param KeyPair $params
     * @return RegisteredSigningBox
     */
    public function getSigningBox(KeyPair $params): RegisteredSigningBox
    {
        return new RegisteredSigningBox($this->_context->callFunction('crypto.get_signing_box', $params));
    }

    /**
     * @param RegisteredSigningBox $params
     * @return ResultOfSigningBoxGetPublicKey
     */
    public function signingBoxGetPublicKey(RegisteredSigningBox $params): ResultOfSigningBoxGetPublicKey
    {
        return new ResultOfSigningBoxGetPublicKey($this->_context->callFunction('crypto.signing_box_get_public_key', $params));
    }

    /**
     * @param ParamsOfSigningBoxSign $params
     * @return ResultOfSigningBoxSign
     */
    public function signingBoxSign(ParamsOfSigningBoxSign $params): ResultOfSigningBoxSign
    {
        return new ResultOfSigningBoxSign($this->_context->callFunction('crypto.signing_box_sign', $params));
    }

    /**
     * @param RegisteredSigningBox $params
     */
    public function removeSigningBox(RegisteredSigningBox $params)
    {
        $this->_context->callFunction('crypto.remove_signing_box', $params);
    }

    /**
     * @param RegisteredEncryptionBox $params
     */
    public function removeEncryptionBox(RegisteredEncryptionBox $params)
    {
        $this->_context->callFunction('crypto.remove_encryption_box', $params);
    }

    /**
     * @param ParamsOfEncryptionBoxGetInfo $params
     * @return ResultOfEncryptionBoxGetInfo
     */
    public function encryptionBoxGetInfo(ParamsOfEncryptionBoxGetInfo $params): ResultOfEncryptionBoxGetInfo
    {
        return new ResultOfEncryptionBoxGetInfo($this->_context->callFunction('crypto.encryption_box_get_info', $params));
    }

    /**
     * Block cipher algorithms pad data to cipher block size so encrypted data can be longer then original data. Client should store the original data size after encryption and use it after
     * decryption to retrieve the original data from decrypted data.
     * @param ParamsOfEncryptionBoxEncrypt $params
     * @return ResultOfEncryptionBoxEncrypt
     */
    public function encryptionBoxEncrypt(ParamsOfEncryptionBoxEncrypt $params): ResultOfEncryptionBoxEncrypt
    {
        return new ResultOfEncryptionBoxEncrypt($this->_context->callFunction('crypto.encryption_box_encrypt', $params));
    }

    /**
     * Block cipher algorithms pad data to cipher block size so encrypted data can be longer then original data. Client should store the original data size after encryption and use it after
     * decryption to retrieve the original data from decrypted data.
     * @param ParamsOfEncryptionBoxDecrypt $params
     * @return ResultOfEncryptionBoxDecrypt
     */
    public function encryptionBoxDecrypt(ParamsOfEncryptionBoxDecrypt $params): ResultOfEncryptionBoxDecrypt
    {
        return new ResultOfEncryptionBoxDecrypt($this->_context->callFunction('crypto.encryption_box_decrypt', $params));
    }

    /**
     * @param ParamsOfCreateEncryptionBox $params
     * @return RegisteredEncryptionBox
     */
    public function createEncryptionBox(ParamsOfCreateEncryptionBox $params): RegisteredEncryptionBox
    {
        return new RegisteredEncryptionBox($this->_context->callFunction('crypto.create_encryption_box', $params));
    }
}
