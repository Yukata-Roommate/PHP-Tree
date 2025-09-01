<?php

declare(strict_types=1);

namespace Tree;

use Tree\Contracts\Config as ConfigContract;

/**
 * Tree Config
 *
 * @package Tree
 */
class Config implements ConfigContract
{
    /*----------------------------------------*
     * Max Depth
     *----------------------------------------*/

    /**
     * Max depth
     *
     * @var int|null
     */
    protected int|null $maxDepth = null;

    /**
     * {@inheritDoc}
     */
    public function setMaxDepth(int|null $depth): static
    {
        $this->maxDepth = $depth;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function maxDepth(): int|null
    {
        return $this->maxDepth;
    }

    /*----------------------------------------*
     * Cache Size
     *----------------------------------------*/

    /**
     * Cache size
     *
     * @var int
     */
    protected int $cacheSize = 10000;

    /**
     * {@inheritDoc}
     */
    public function setCacheSize(int $size): static
    {
        $this->cacheSize = max(1, $size);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function cacheSize(): int
    {
        return $this->cacheSize;
    }

    /*----------------------------------------*
     * Regex Cache Size
     *----------------------------------------*/

    /**
     * Regex cache size
     *
     * @var int
     */
    protected int $regexCacheSize = 1000;

    /**
     * {@inheritDoc}
     */
    public function setRegexCacheSize(int $size): static
    {
        $this->regexCacheSize = max(1, $size);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function regexCacheSize(): int
    {
        return $this->regexCacheSize;
    }

    /*----------------------------------------*
     * Memory Limit
     *----------------------------------------*/

    /**
     * Memory limit
     *
     * @var int
     */
    protected int $memoryLimit = 104857600; // 100 MB

    /**
     * {@inheritDoc}
     */
    public function setMemoryLimit(int $limit): static
    {
        $this->memoryLimit = max(0, $limit);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function memoryLimit(): int
    {
        return $this->memoryLimit;
    }

    /*----------------------------------------*
     * Exclude Patterns
     *----------------------------------------*/

    /**
     * Exclude patterns
     *
     * @var array<int, string>
     */
    protected array $excludePatterns = [];

    

    /*----------------------------------------*
     * Show Hidden
     *----------------------------------------*/

    /**
     * Whether to show hidden files
     *
     * @var bool
     */
    protected bool $showHidden = false;

    /*----------------------------------------*
     * Show File Size
     *----------------------------------------*/

    /**
     * Whether to show file size
     *
     * @var bool
     */
    protected bool $showFileSize = false;

    /*----------------------------------------*
     * Show Last Modified
     *----------------------------------------*/

    /**
     * Whether to show last modified time
     *
     * @var bool
     */
    protected bool $showLastModified = false;

    /*----------------------------------------*
     * Show Statistics
     *----------------------------------------*/

    /**
     * Whether to show statistics
     *
     * @var bool
     */
    protected bool $showStatistics = false;

    /*----------------------------------------*
     * Consider Gitignores
     *----------------------------------------*/

    /**
     * Whether to consider .gitignore files
     *
     * @var bool
     */
    protected bool $considerGitignores = false;

    /*----------------------------------------*
     * Strict Mode
     *----------------------------------------*/

    /**
     * Whether to enable strict mode
     *
     * @var bool
     */
    protected bool $strictMode = false;
}
