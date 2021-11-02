<?php

declare(strict_types=1);

namespace Services\Cache;

use Redis;

class RedisCacheManager extends CacheManagerAbstract implements CacheManagerInterface
{
    public function __construct()
    {
        $this->cache = new Redis();
    }

    public function connect(string $host, string $port): void
    {
        $this->cache->connect($host, $port);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null): void
    {
        $this->cache->set($key, $value, $ttl);
    }

    public function get(string $key): string
    {
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value): void
    {
        $this->cache->lPush($key, $value);
    }
}
