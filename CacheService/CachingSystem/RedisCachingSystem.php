<?php

namespace Snubes\CodeChallenge\CacheService\CachingSystem;

use Snubes\CodeChallenge\CacheService\AbstractCachingSystem;
use \Redis;
use Snubes\CodeChallenge\CacheService\PushCacheInterface;

class RedisCachingSystem extends AbstractCachingSystem implements PushCacheInterface
{
    public function __construct()
    {
        $this->cache = new Redis();
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $isCompressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $isCompressed = null, string $ttl = null): void
    {
        $this->cache->set($key, $value, $ttl);
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function lpush(string $key, string $value): void
    {
        $this->cache->lPush($key,$value);
    }
}