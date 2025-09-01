<?php

declare(strict_types=1);

namespace Tree\Contracts\Cache;

/**
 * Cache Manager Contract
 *
 * @package Tree\Contracts\Cache
 */
interface Manager
{
    /*----------------------------------------*
     * Caches
     *----------------------------------------*/

    /**
     * Clear all caches
     *
     * @return void
     */
    public function clearCaches(): void;

    /*----------------------------------------*
     * Statistics
     *----------------------------------------*/

    /**
     * Get statistics
     *
     * @return array<string, mixed>
     */
    public function statistics(): array;

    /*----------------------------------------*
     * Path Cache
     *----------------------------------------*/

    /**
     * Get path cache
     *
     * @param string $path
     * @return bool|null
     */
    public function pathCache(string $path): bool|null;

    /**
     * Set path cache
     *
     * @param string $path
     * @param bool $ignore
     * @return void
     */
    public function setPathCache(string $path, bool $ignore): void;

    /**
     * Get path cache size
     *
     * @return int
     */
    public function pathCacheSize(): int;

    /*----------------------------------------*
     * Regex Cache
     *----------------------------------------*/

    /**
     * Get regex cache
     *
     * @param string $pattern
     * @return string|null
     */
    public function regexCache(string $pattern): string|null;

    /**
     * Set regex cache
     *
     * @param string $pattern
     * @param string $regex
     * @return void
     */
    public function setRegexCache(string $pattern, string $regex): void;

    /**
     * Get regex cache size
     *
     * @return int
     */
    public function regexCacheSize(): int;
}
