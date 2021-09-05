<?php

namespace Snubes\CodeChallenge\CacheService\CachingSystem;

use Snubes\CodeChallenge\CacheService\AbstractCachingSystem;
use \Memcache;

class MemcacheCachingSystem extends AbstractCachingSystem
{
    private $cache;

    public function __construct()
    {
        $this->cache = new Memcache();
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $isCompressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $isCompressed = null, string $ttl = null): void
    {
       $this->cache->set($key, $value, $isCompressed, $ttl);
    }

}