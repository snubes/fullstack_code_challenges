<?php

declare(strict_types=1);

namespace Services\Cache;

use Exception;
use Memcache;

class MemcacheCacheManager extends CacheManagerAbstract implements CacheManagerInterface
{
    public function __construct()
    {
        $this->cache = new Memcache();
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null): void
    {
        $this->cache->set($key,$value,$is_compressed,$ttl);
    }

    public function get(string $key): string
    {
        return $this->cache->get($key);
    }

    /**
     * @throws Exception
     */
    public function lpush(string $key, string $value): void
    {
        throw new Exception("method not supported");
    }
}
