<?php

namespace App;

class RedisAdapter implements cacheAdapterInterface
{
    protected \Redis $cache;

    public function __construct($host,$port)
    {
        $this->cache = new \Redis();
        $this->cache->connect($host, $port);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {
        $this->cache->set($key, $value, $ttl);
    }

    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value)
    {
        $this->cache->lPush($key, $value);
    }
}