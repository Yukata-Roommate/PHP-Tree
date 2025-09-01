<?php

declare(strict_types=1);

namespace Tree\Contracts\Cache;

/**
 * Cache Storage Contract
 *
 * @package Tree\Contracts\Cache
 */
interface Storage
{
    /*----------------------------------------*
     * Control
     *----------------------------------------*/

    /**
     * Get cache item by key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * Set cache item by key
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, mixed $value): void;

    /**
     * Check if cache item exists by key
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * Delete cache item by key
     *
     * @param string $key
     * @return void
     */
    public function delete(string $key): void;

    /**
     * Clear all cache items
     *
     * @return void
     */
    public function clear(): void;

    /*----------------------------------------*
     * Size
     *----------------------------------------*/

    /**
     * Get cache size
     *
     * @return int
     */
    public function size(): int;

    /**
     * Get cache max size
     *
     * @return int
     */
    public function maxSize(): int;

    /**
     * Check if cache size exceeds limit
     *
     * @return bool
     */
    public function isExceeded(): bool;

    /*----------------------------------------*
     * Statistics
     *----------------------------------------*/

    /**
     * Get cache hit count
     *
     * @return int
     */
    public function hitCount(): int;

    /**
     * Get cache miss count
     *
     * @return int
     */
    public function missCount(): int;

    /**
     * Get cache total requests count
     *
     * @return int
     */
    public function totalCount(): int;

    /**
     * Get cache hit rate
     *
     * @return float
     */
    public function hitRate(): float;

    /**
     * Get cache miss rate
     *
     * @return float
     */
    public function missRate(): float;

    /**
     * Get cache statistics
     *
     * @return array<string, mixed>
     */
    public function statistics(): array;

    /**
     * Reset cache statistics
     *
     * @return void
     */
    public function resetStatistics(): void;
}
