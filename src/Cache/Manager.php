<?php

declare(strict_types=1);

namespace Tree\Cache;

use Tree\Contracts\Cache\Manager as ManagerContract;

use Tree\Contracts\Cache\Storage;
use Tree\Cache\Storage\LRUStorage;

/**
 * Cache Manager
 *
 * @package Tree\Cache
 */
class Manager implements ManagerContract
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * Constructor
     *
     * @param int $pathCacheSize
     * @param int $regexCacheSize
     */
    public function __construct(int $pathCacheSize, int $regexCacheSize)
    {
        $this->pathCache  = new LRUStorage($pathCacheSize);
        $this->regexCache = new LRUStorage($regexCacheSize);
    }

    /*----------------------------------------*
     * Caches
     *----------------------------------------*/

    /**
     * {@inheritDoc}
     */
    public function clearCaches(): void
    {
        $this->pathCache->clear();
        $this->regexCache->clear();
    }

    /*----------------------------------------*
     * Statistics
     *----------------------------------------*/

    /**
     * {@inheritDoc}
     */
    public function statistics(): array
    {
        return [
            "path"  => $this->pathCache->statistics(),
            "regex" => $this->regexCache->statistics(),
        ];
    }

    /*----------------------------------------*
     * Path Cache
     *----------------------------------------*/

    /**
     * Path cache storage
     *
     * @var \Tree\Contracts\Cache\Storage
     */
    protected Storage $pathCache;

    /**
     * {@inheritDoc}
     */
    public function pathCache(string $path): bool|null
    {
        return $this->pathCache->get($this->createPathCacheKey($path));
    }

    /**
     * {@inheritDoc}
     */
    public function setPathCache(string $path, bool $ignore): void
    {
        $this->pathCache->set($this->createPathCacheKey($path), $ignore);
    }

    /**
     * {@inheritDoc}
     */
    public function pathCacheSize(): int
    {
        return $this->pathCache->size();
    }

    /**
     * Create path cache key
     *
     * @param string $path
     * @return string
     */
    protected function createPathCacheKey(string $path): string
    {
        $normalizedPath = @realpath($path) ?: $path;

        return $normalizedPath . ":" . hash("xxh32", $path);
    }

    /*----------------------------------------*
     * Regex Cache
     *----------------------------------------*/

    /**
     * Regex cache storage
     *
     * @var \Tree\Contracts\Cache\Storage
     */
    protected Storage $regexCache;

    /**
     * {@inheritDoc}
     */
    public function regexCache(string $pattern): string|null
    {
        return $this->regexCache->get($this->createRegexCacheKey($pattern));
    }

    /**
     * {@inheritDoc}
     */
    public function setRegexCache(string $pattern, string $regex): void
    {
        $this->regexCache->set($this->createRegexCacheKey($pattern), $regex);
    }

    /**
     * {@inheritDoc}
     */
    public function regexCacheSize(): int
    {
        return $this->regexCache->size();
    }

    /**
     * Create regex cache key
     *
     * @param string $pattern
     * @return string
     */
    protected function createRegexCacheKey(string $pattern): string
    {
        return $pattern;
    }
}
