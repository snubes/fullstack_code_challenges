<?php

namespace App;

use Exception;

class MemcachedAdapter implements cacheAdapterInterface
{
    protected \Memcached $cache;

    public function __construct($host,$port)
    {
        $this->cache = new \Memcached();
        $this->cache->addServer($host, $port);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {
        $this->cache->set($key, $value, $is_compressed);
    }

    public function get(string $key): mixed
    {
        return $this->cache->get($key);
    }

    /**
     * @throws Exception
     */
    public function lpush(string $key, string $value)
    {
        throw new Exception("method not supported");
    }
}