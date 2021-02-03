<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class ResultOfBuildInfo implements JsonSerializable
{
    private int $_buildNumber;

    /** @var BuildInfoDependency[] */
    private array $_dependencies;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_buildNumber = $dto['build_number'] ?? 0;
        $this->_dependencies = $dto['dependencies'] ?? [];
    }

    public function getBuildNumber(): int
    {
        return $this->_buildNumber;
    }

    /**
     * @return BuildInfoDependency[]
     */
    public function getDependencies(): array
    {
        return $this->_dependencies;
    }

    /**
     * @return self
     */
    public function setBuildNumber(int $buildNumber): self
    {
        $this->_buildNumber = $buildNumber;
        return $this;
    }

    /**
     * @param BuildInfoDependency[] $dependencies
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
