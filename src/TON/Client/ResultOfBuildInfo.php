<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;

class ResultOfBuildInfo implements JsonSerializable
{
    /** Build number assigned to this build by the CI. */
    private int $_buildNumber;

    /** Fingerprint of the most important dependencies. */
    private array $_dependencies;

    public function __construct(?array $dto = null)
    {
        if (!$dto) return;
        $this->_buildNumber = $dto['build_number'];
        $this->_dependencies = $dto['dependencies'];
    }

    /**
     * Build number assigned to this build by the CI.
     */
    public function getBuildNumber(): int
    {
        return $this->_buildNumber;
    }

    /**
     * Fingerprint of the most important dependencies.
     */
    public function getDependencies(): array
    {
        return $this->_dependencies;
    }

    /**
     * Build number assigned to this build by the CI.
     */
    public function setBuildNumber(int $buildNumber): self
    {
        $this->_buildNumber = $buildNumber;
        return $this;
    }

    /**
     * Fingerprint of the most important dependencies.
     */
    public function setDependencies(array $dependencies): self
    {
        $this->_dependencies = $dependencies;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_buildNumber !== null) $result['build_number'] = $this->_buildNumber;
        if ($this->_dependencies !== null) $result['dependencies'] = $this->_dependencies;
        return $result;
    }
}
