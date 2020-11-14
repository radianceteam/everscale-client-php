<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;

class BuildInfoDependency implements JsonSerializable
{
    /** Dependency name. Usually it is a crate name. */
    private string $_name;

    /** Git commit hash of the related repository. */
    private string $_gitCommit;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_name = $dto['name'] ?? '';
        $this->_gitCommit = $dto['git_commit'] ?? '';
    }

    /**
     * Dependency name. Usually it is a crate name.
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * Git commit hash of the related repository.
     */
    public function getGitCommit(): string
    {
        return $this->_gitCommit;
    }

    /**
     * Dependency name. Usually it is a crate name.
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * Git commit hash of the related repository.
     */
    public function setGitCommit(string $gitCommit): self
    {
        $this->_gitCommit = $gitCommit;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_name !== null) $result['name'] = $this->_name;
        if ($this->_gitCommit !== null) $result['git_commit'] = $this->_gitCommit;
        return $result;
    }
}
