<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;

class CryptoConfig implements JsonSerializable
{
    private ?int $_mnemonicDictionary;
    private ?int $_mnemonicWordCount;
    private ?string $_hdkeyDerivationPath;
    private ?bool $_hdkeyCompliant;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_mnemonicDictionary = $dto['mnemonic_dictionary'] ?? null;
        $this->_mnemonicWordCount = $dto['mnemonic_word_count'] ?? null;
        $this->_hdkeyDerivationPath = $dto['hdkey_derivation_path'] ?? null;
        $this->_hdkeyCompliant = $dto['hdkey_compliant'] ?? null;
    }

    public function getMnemonicDictionary(): ?int
    {
        return $this->_mnemonicDictionary;
    }

    public function getMnemonicWordCount(): ?int
    {
        return $this->_mnemonicWordCount;
    }

    public function getHdkeyDerivationPath(): ?string
    {
        return $this->_hdkeyDerivationPath;
    }

    public function isHdkeyCompliant(): ?bool
    {
        return $this->_hdkeyCompliant;
    }

    public function setMnemonicDictionary(?int $mnemonicDictionary): self
    {
        $this->_mnemonicDictionary = $mnemonicDictionary;
        return $this;
    }

    public function setMnemonicWordCount(?int $mnemonicWordCount): self
    {
        $this->_mnemonicWordCount = $mnemonicWordCount;
        return $this;
    }

    public function setHdkeyDerivationPath(?string $hdkeyDerivationPath): self
    {
        $this->_hdkeyDerivationPath = $hdkeyDerivationPath;
        return $this;
    }

    public function setHdkeyCompliant(?bool $hdkeyCompliant): self
    {
        $this->_hdkeyCompliant = $hdkeyCompliant;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_mnemonicDictionary !== null) $result['mnemonic_dictionary'] = $this->_mnemonicDictionary;
        if ($this->_mnemonicWordCount !== null) $result['mnemonic_word_count'] = $this->_mnemonicWordCount;
        if ($this->_hdkeyDerivationPath !== null) $result['hdkey_derivation_path'] = $this->_hdkeyDerivationPath;
        if ($this->_hdkeyCompliant !== null) $result['hdkey_compliant'] = $this->_hdkeyCompliant;
        return $result;
    }
}
