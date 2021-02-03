<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class BuildInfoDependency implements JsonSerializable
{
    /** Usually it is a crate name. */
    private string $_name;
    private string $_gitCommit;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_name = $dto['name'] ?? '';
        $this->_gitCommit = $dto['git_commit'] ?? '';
    }

    /**
     * Usually it is a crate name.
     */
    public function getName(): string
    {
        return $this->_name;
    }

    public function getGitCommit(): string
    {
        return $this->_gitCommit;
    }

    /**
     * Usually it is a crate name.
     * @return self
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return self
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
        return !empty($result) ? $result : new stdClass();
    }
}
