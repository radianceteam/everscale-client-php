<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

final class CryptoErrorCode
{
    public const InvalidPublicKey = 100;
    public const InvalidSecretKey = 101;
    public const InvalidKey = 102;
    public const InvalidFactorizeChallenge = 106;
    public const InvalidBigInt = 107;
    public const ScryptFailed = 108;
    public const InvalidKeySize = 109;
    public const NaclSecretBoxFailed = 110;
    public const NaclBoxFailed = 111;
    public const NaclSignFailed = 112;
    public const Bip39InvalidEntropy = 113;
    public const Bip39InvalidPhrase = 114;
    public const Bip32InvalidKey = 115;
    public const Bip32InvalidDerivePath = 116;
    public const Bip39InvalidDictionary = 117;
    public const Bip39InvalidWordCount = 118;
    public const MnemonicGenerationFailed = 119;
    public const MnemonicFromEntropyFailed = 120;
    public const SigningBoxNotRegistered = 121;
    public const InvalidSignature = 122;
    public const EncryptionBoxNotRegistered = 123;
    public const InvalidIvSize = 124;
    public const UnsupportedCipherMode = 125;
    public const CannotCreateCipher = 126;
    public const EncryptDataError = 127;
    public const DecryptDataError = 128;
    public const IvRequired = 129;
    public const CryptoBoxNotRegistered = 130;
    public const InvalidCryptoBoxType = 131;
    public const CryptoBoxSecretSerializationError = 132;
    public const CryptoBoxSecretDeserializationError = 133;
    public const InvalidNonceSize = 134;
}
