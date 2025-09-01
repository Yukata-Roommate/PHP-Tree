<?php

declare(strict_types=1);

namespace Tree\Cache\Storage;

use Tree\Contracts\Cache\Storage as StorageContract;

/**
 * Cache LRU Storage
 *
 * @package Tree\Cache\Storage
 */
class LRUStorage implements StorageContract
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * Constructor
     *
     * @param int $maxSize
     */
    public function __construct(int $maxSize)
    {
        $this->maxSize = max(1, $maxSize);
    }

    /*----------------------------------------*
     * Control
     *----------------------------------------*/

    /**
     * Cache items
     *
     * @var array<string, mixed>
     */
    protected array $cache = [];

    /**
     * {@inheritDoc}
     */
    public function get(string $key): mixed
    {
        if (!$this->has($key)) return $this->incrementMissCount();

        $this->accessOrder[$key] = $this->accessCounter++;

        if ($this->accessCounter > PHP_INT_MAX - 1000) $this->resetAccessCounters();

        $this->incrementHitCount();

        return $this->cache[$key];
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $key, mixed $value): void
    {
        if (!$this->has($key) && $this->isExceeded()) $this->evictLRU();

        $this->cache[$key]       = $value;
        $this->accessOrder[$key] = ++$this->accessCounter;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->cache);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $key): void
    {
        unset($this->cache[$key], $this->accessOrder[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function clear(): void
    {
        $this->cache         = [];
        $this->accessOrder   = [];
        $this->accessCounter = 0;
    }

    /*----------------------------------------*
     * Size
     *----------------------------------------*/

    /**
     * Max size
     *
     * @var int
     */
    protected int $maxSize;

    /**
     * {@inheritDoc}
     */
    public function size(): int
    {
        return count($this->cache);
    }

    /**
     * {@inheritDoc}
     */
    public function maxSize(): int
    {
        return $this->maxSize;
    }

    /**
     * {@inheritDoc}
     */
    public function isExceeded(): bool
    {
        return $this->size() > $this->maxSize();
    }

    /*----------------------------------------*
     * Least Recently Used
     *----------------------------------------*/

    /**
     * Access order
     *
     * @var array<string, int>
     */
    protected array $accessOrder = [];

    /**
     * Access counter
     *
     * @var int
     */
    protected int $accessCounter = 0;

    /**
     * Evict least recently used item
     *
     * @return void
     */
    protected function evictLRU(): void
    {
        if (empty($this->accessOrder)) return;

        $lruKey = array_search(min($this->accessOrder), $this->accessOrder, true);

        if ($lruKey === false) return;

        $this->delete($lruKey);
    }

    /**
     * Reset access counters
     *
     * @return void
     */
    protected function resetAccessCounters(): void
    {
        $sorted = $this->accessOrder;
        asort($sorted);

        $newCounter = 0;

        foreach ($sorted as $key => $_) {
            $this->accessOrder[$key] = $newCounter++;
        }

        $this->accessCounter = $newCounter;
    }

    /*----------------------------------------*
     * Statistics
     *----------------------------------------*/

    /**
     * Cache hit count
     *
     * @var int
     */
    protected int $hitCount = 0;

    /**
     * Cache miss count
     *
     * @var int
     */
    protected int $missCount = 0;

    /**
     * Increment hit count
     *
     * @return null
     */
    protected function incrementHitCount(): null
    {
        $this->hitCount++;

        return null;
    }

    /**
     * Increment miss count
     *
     * @return null
     */
    protected function incrementMissCount(): null
    {
        $this->missCount++;

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function hitCount(): int
    {
        return $this->hitCount;
    }

    /**
     * {@inheritDoc}
     */
    public function missCount(): int
    {
        return $this->missCount;
    }

    /**
     * {@inheritDoc}
     */
    public function totalCount(): int
    {
        return $this->hitCount + $this->missCount;
    }

    /**
     * {@inheritDoc}
     */
    public function hitRate(): float
    {
        $total = $this->totalCount();

        $rate = $total > 0 ? ($this->hitCount / $total) * 100.0 : 0.0;

        return round($rate, 2);
    }

    /**
     * {@inheritDoc}
     */
    public function missRate(): float
    {
        $total = $this->totalCount();

        $rate = $total > 0 ? ($this->missCount / $total) * 100.0 : 0.0;

        return round($rate, 2);
    }

    /**
     * {@inheritDoc}
     */
    public function statistics(): array
    {
        return [
            "size" => [
                "current" => $this->size(),
                "max"     => $this->maxSize(),
            ],
            "count" => [
                "hits"   => $this->hitCount(),
                "misses" => $this->missCount(),
                "total"  => $this->totalCount(),
            ],
            "rate" => [
                "hit"  => $this->hitRate(),
                "miss" => $this->missRate(),
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function resetStatistics(): void
    {
        $this->hitCount  = 0;
        $this->missCount = 0;
    }
}
