<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfIteratorNext implements JsonSerializable
{
    /**
     * Note that `iterator_next` can return an empty items and `has_more` equals to `true`.
     * In this case the application have to continue iteration.
     * Such situation can take place when there is no data yet but
     * the requested `end_time` is not reached.
     */
    private array $_items;
    private bool $_hasMore;

    /**
     * This field is returned only if the `return_resume_state` parameter
     * is specified.
     *
     * Note that `resume_state` corresponds to the iteration position
     * after the returned items.
     */
    private $_resumeState;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_items = $dto['items'] ?? [];
        $this->_hasMore = $dto['has_more'] ?? false;
        $this->_resumeState = $dto['resume_state'] ?? null;
    }

    /**
     * Note that `iterator_next` can return an empty items and `has_more` equals to `true`.
     * In this case the application have to continue iteration.
     * Such situation can take place when there is no data yet but
     * the requested `end_time` is not reached.
     */
    public function getItems(): array
    {
        return $this->_items;
    }

    public function isHasMore(): bool
    {
        return $this->_hasMore;
    }

    /**
     * This field is returned only if the `return_resume_state` parameter
     * is specified.
     *
     * Note that `resume_state` corresponds to the iteration position
     * after the returned items.
     */
    public function getResumeState()
    {
        return $this->_resumeState;
    }

    /**
     * Note that `iterator_next` can return an empty items and `has_more` equals to `true`.
     * In this case the application have to continue iteration.
     * Such situation can take place when there is no data yet but
     * the requested `end_time` is not reached.
     * @return self
     */
    public function setItems(array $items): self
    {
        $this->_items = $items;
        return $this;
    }

    /**
     * @return self
     */
    public function setHasMore(bool $hasMore): self
    {
        $this->_hasMore = $hasMore;
        return $this;
    }

    /**
     * This field is returned only if the `return_resume_state` parameter
     * is specified.
     *
     * Note that `resume_state` corresponds to the iteration position
     * after the returned items.
     * @return self
     */
    public function setResumeState($resumeState): self
    {
        $this->_resumeState = $resumeState;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_items !== null) $result['items'] = $this->_items;
        if ($this->_hasMore !== null) $result['has_more'] = $this->_hasMore;
        if ($this->_resumeState !== null) $result['resume_state'] = $this->_resumeState;
        return !empty($result) ? $result : new stdClass();
    }
}
