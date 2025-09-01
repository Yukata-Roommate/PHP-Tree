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
     * Path cache size
     *
     * @var int
     */
    protected int $pathCacheSize = 1000;

    /**
     * {@inheritDoc}
     */
    public function setPathCacheSize(int $size): static
    {
        $this->pathCacheSize = max(1, $size);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function pathCacheSize(): int
    {
        return $this->pathCacheSize;
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

    /**
     * {@inheritDoc}
     */
    public function setExcludePatterns(array $patterns): static
    {
        $this->excludePatterns = array_values($patterns);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addExcludePattern(string $pattern): static
    {
        if (!in_array($pattern, $this->excludePatterns, true)) $this->excludePatterns[] = $pattern;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function excludePatterns(): array
    {
        return $this->excludePatterns;
    }

    /*----------------------------------------*
     * Show Hidden
     *----------------------------------------*/

    /**
     * Whether to show hidden files
     *
     * @var bool
     */
    protected bool $showHidden = false;

    /**
     * {@inheritDoc}
     */
    public function setShowHidden(bool $show): static
    {
        $this->showHidden = $show;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function showHidden(): bool
    {
        return $this->showHidden;
    }

    /*----------------------------------------*
     * Show File Size
     *----------------------------------------*/

    /**
     * Whether to show file size
     *
     * @var bool
     */
    protected bool $showFileSize = false;

    /**
     * {@inheritDoc}
     */
    public function setShowFileSize(bool $show): static
    {
        $this->showFileSize = $show;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function showFileSize(): bool
    {
        return $this->showFileSize;
    }

    /*----------------------------------------*
     * Show Last Modified
     *----------------------------------------*/

    /**
     * Whether to show last modified time
     *
     * @var bool
     */
    protected bool $showLastModified = false;

    /**
     * {@inheritDoc}
     */
    public function setShowLastModified(bool $show): static
    {
        $this->showLastModified = $show;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function showLastModified(): bool
    {
        return $this->showLastModified;
    }

    /*----------------------------------------*
     * Show Statistics
     *----------------------------------------*/

    /**
     * Whether to show statistics
     *
     * @var bool
     */
    protected bool $showStatistics = false;

    /**
     * {@inheritDoc}
     */
    public function setShowStatistics(bool $show): static
    {
        $this->showStatistics = $show;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function showStatistics(): bool
    {
        return $this->showStatistics;
    }

    /*----------------------------------------*
     * Consider Gitignores
     *----------------------------------------*/

    /**
     * Whether to consider .gitignore files
     *
     * @var bool
     */
    protected bool $considerGitignores = false;

    /**
     * {@inheritDoc}
     */
    public function setConsiderGitignores(bool $consider): static
    {
        $this->considerGitignores = $consider;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function considerGitignores(): bool
    {
        return $this->considerGitignores;
    }

    /*----------------------------------------*
     * Strict Mode
     *----------------------------------------*/

    /**
     * Whether to enable strict mode
     *
     * @var bool
     */
    protected bool $strictMode = false;

    /**
     * {@inheritDoc}
     */
    public function setStrictMode(bool $strict): static
    {
        $this->strictMode = $strict;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function strictMode(): bool
    {
        return $this->strictMode;
    }
}
