<?php

namespace Snubes;

/**
 * MemcacheCache is a wrapper on Memcache
 */
class MemcacheCache implements CachingSystemInterface
{
    private $cache;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $cache = new \Memcache();
        $this->cache = $cache->connect($config->host, $config->port);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    /**
     * @throws Exception
     */
    public function lpush(string $key, string $value)
    {
        throw new \Exception("method not supported");
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {
        $this->cache->set($key, $value, $is_compressed, $ttl);
    }
}
