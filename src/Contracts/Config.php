<?php

declare(strict_types=1);

namespace Tree\Contracts;

/**
 * Tree Config Contract
 *
 * @package Tree\Contracts
 */
interface Config
{
    /*----------------------------------------*
     * Max Depth
     *----------------------------------------*/

    /**
     * Set max depth
     *
     * @param int|null $depth
     * @return static
     */
    public function setMaxDepth(int|null $depth): static;

    /**
     * Get max depth
     *
     * @return int|null
     */
    public function maxDepth(): int|null;

    /*----------------------------------------*
     * Path Cache Size
     *----------------------------------------*/

    /**
     * Set path cache size
     *
     * @param int $size
     * @return static
     */
    public function setPathCacheSize(int $size): static;

    /**
     * Get path cache size
     *
     * @return int
     */
    public function pathCacheSize(): int;

    /*----------------------------------------*
     * Regex Cache Size
     *----------------------------------------*/

    /**
     * Set regex cache size
     *
     * @param int $size
     * @return static
     */
    public function setRegexCacheSize(int $size): static;

    /**
     * Get regex cache size
     *
     * @return int
     */
    public function regexCacheSize(): int;

    /*----------------------------------------*
     * Memory Limit
     *----------------------------------------*/

    /**
     * Set memory limit
     *
     * @param int $limit
     * @return static
     */
    public function setMemoryLimit(int $limit): static;

    /**
     * Get memory limit
     *
     * @return int
     */
    public function memoryLimit(): int;

    /*----------------------------------------*
     * Exclude Patterns
     *----------------------------------------*/

    /**
     * Set exclude patterns
     *
     * @param array<int, string> $patterns
     * @return static
     */
    public function setExcludePatterns(array $patterns): static;

    /**
     * Add exclude pattern
     *
     * @param string $pattern
     * @return static
     */
    public function addExcludePattern(string $pattern): static;

    /**
     * Get exclude patterns
     *
     * @return array<int, string>
     */
    public function excludePatterns(): array;

    /*----------------------------------------*
     * Show Hidden
     *----------------------------------------*/

    /**
     * Set show hidden
     *
     * @param bool $show
     * @return static
     */
    public function setShowHidden(bool $show): static;

    /**
     * Whether should show hidden files
     *
     * @return bool
     */
    public function showHidden(): bool;

    /*----------------------------------------*
     * Show File Size
     *----------------------------------------*/

    /**
     * Set show file size
     *
     * @param bool $show
     * @return static
     */
    public function setShowFileSize(bool $show): static;

    /**
     * Whether should show file size
     *
     * @return bool
     */
    public function showFileSize(): bool;

    /*----------------------------------------*
     * Show Last Modified
     *----------------------------------------*/

    /**
     * Set show last modified
     *
     * @param bool $show
     * @return static
     */
    public function setShowLastModified(bool $show): static;

    /**
     * Whether should show last modified
     *
     * @return bool
     */
    public function showLastModified(): bool;

    /*----------------------------------------*
     * Show Statistics
     *----------------------------------------*/

    /**
     * Set show statistics
     *
     * @param bool $show
     * @return static
     */
    public function setShowStatistics(bool $show): static;

    /**
     * Whether should show statistics
     *
     * @return bool
     */
    public function showStatistics(): bool;

    /*----------------------------------------*
     * Consider Gitignores
     *----------------------------------------*/

    /**
     * Set consider gitignores
     *
     * @param bool $consider
     * @return static
     */
    public function setConsiderGitignores(bool $consider): static;

    /**
     * Whether should consider gitignores
     *
     * @return bool
     */
    public function considerGitignores(): bool;

    /*----------------------------------------*
     * Strict Mode
     *----------------------------------------*/

    /**
     * Set strict mode
     *
     * @param bool $strict
     * @return static
     */
    public function setStrictMode(bool $strict): static;

    /**
     * Whether is in strict mode
     *
     * @return bool
     */
    public function strictMode(): bool;
}
